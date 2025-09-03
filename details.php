<?php
require_once ('includes/dbconfig.php');
require_once ('includes/jdf.php');
if(!isset($_GET['id'])){
    header('location:index.php');
    exit();
}
$id = $_GET['id'];
//get data
$data = $conn->query("SELECT * FROM `products`
INNER JOIN `categories` ON `categories`.`CID`=`products`.`catid`
WHERE `pid`=$id");
$rows = $data->fetch();
//random products
$products = $conn->query("SELECT * FROM `products` WHERE `pid`!=$id  ORDER BY rand() LIMIT 4");
//submit comment
if(isset($_POST['submit'])){
    $text = $_POST['comment'];
    $now = time();
    $comment = $conn->prepare("INSERT INTO `comments` (`userid`,`proid`,`comment`,`comment_date`) VALUES (?,?,?,?)");
    $comment->bindValue(1,$_SESSION['userid']);
    $comment->bindValue(2,$id);
    $comment->bindValue(3,$text);
    $comment->bindValue(4,$now);
    $comment->execute();
    header('location:details.php?id='.$id.'&op=ok');
    exit();
}
//read comments
$rcomments = $conn->prepare("SELECT * FROM `comments` 
    INNER JOIN `users` ON `comments`.`userid`=`users`.`ID` 
    WHERE `proid`=:id ORDER BY `comment_date` DESC ");
$rcomments->bindParam(':id', $id);
$rcomments->execute();
//buy
if(isset($_GET['buy'])){
    $_SESSION['basket'][] = $id;
}
$title = $rows['title'];
include('includes/header.php');
?>

<<style>
body.dark-mode {
    background-color: #121212 !important;
    color: #e0e0e0 !important;
}
body.dark-mode .card {
    background-color: #1e1e1e !important;
    color: #f5f5f5 !important;
}
body.dark-mode .bg-light,
body.dark-mode .bg-white {
    background-color: #1c1c1c !important;
    color: #f0f0f0 !important;
}
body.dark-mode .form-control,
body.dark-mode .form-range,
body.dark-mode textarea {
    background-color: #2c2c2c !important;
    color: #f0f0f0 !important;
    border: 1px solid #555 !important;
}
</style>

<main>
    <div class="container mt-5">
        <div class="alert alert-success"><a href="index.php">خانه</a> > <a href="index.php"><?=$rows['cname']?></a> > <?=$title?></div>
        <div class="text-right">
            <h4 class="font-weight-bold"></h4>
            <div class="card my-4">
                <div class="card-body bg-light">
                    <div class="col-12">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                            <div class="px-2 col-md-5">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php
                                        $pic = explode(',',$rows['images']);
                                        $i=0;
                                        foreach ($pic as $pic){
                                            $i++;
                                            ?>
                                            <div class="carousel-item <?=$i==1?'active':''?>">
                                                <img class="w-100" src="img/products/<?=$pic?>" alt="<?=$title?>">
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="float-left col-md-7">
                                <h4 class="fw-bold"><?=$rows['title']?></h4>
                                <ul>
                                <?php if($rows['count']!='') { ?>
                                    <li><b>تعداد : </b> <?=$rows['count']>0?$rows['count']:'<span class="text-danger">اتمام موجودی</span>'?></li>
                                <?php }if(!empty($rows['color'])){ ?>
                                <li class="pt-2"><b> رنگ: </b><?=$rows['color']?></li>
                                <?php }if(!empty($rows['price'])){ ?>
                                <li class="pt-2"><b>قیمت رسمی : </b><?=number_format($rows['price'])?> تومان</li>
                                <?php }if(!empty($rows['discount'])){ ?>
                                <li class="pt-2"><b>قیمت با تخفیف : </b><?=number_format($rows['discount'])?> تومان</li>
                                <?php } ?>
                                <li class="pt-2"><b>تاریخ ثبت: </b><?=jdate('Y/m/d',$rows['created_at'])?></li>
                                </ul>
                                <hr>
                                <?php if($rows['keyfeatures']){ ?>
                                    <p class="pt-2 text-justify"><?=nl2br($rows['keyfeatures'])?></p>
                                <?php } ?>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php if(!empty($rows['description'])){ ?>
                        <div class="bg-white p-3 mt-3 border rounded">
                            <p class="pt-2 text-justify"><?=nl2br($rows['description'])?></p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php if(isset($_SESSION['userid'])) { ?>
                <?php if(isset($_SESSION['basket']) && @in_array($rows['pid'],@$_SESSION['basket'])){ ?>
                    <div class="alert alert-warning">سفارش شما با موفقیت ثبت شد برای ادامه روی <a href="user/basket.php">سبد    خرید</a> کلیک نمایید.</div>
                <?php }else{ if($rows['count']){ ?>
                    <a href="details.php?id=<?=$id?>&buy" class="btn btn-success d-grid">خرید</a>
                <?php } }?>
            <?php }else{ ?>
                <div class="alert alert-danger">جهت ثبت سفارش وارد <a href="login.php">حساب کاربری</a> خود شوید</div>
            <?php } ?>
        </div>
        <!-- -->
        <div class="row py-5">
            <div class="col-md-3">
                <h5 class="font-weight-bold"><i class="fa fa-leaf text-success"></i> سایر محصولات</h5>
            </div>
            <div class="col-md-9">
                <hr class="text-success">
            </div>
        </div>
        <!-- -->
        <div class="row py-5">
            <?php while($pro_row = $products->fetch()) {
                $pic = explode(',',$pro_row['images']);
                shuffle($pic);
                ?>
                <div class="col-md-3">
                    <a href="details.php?id=<?=$pro_row['pid']?>">
                    <div class="card text-right btn btn-outline-secondary border-success">
                        <div class="d-flex justify-content-center p-2">
                        <img class="img-thumbnail w-75 img-fluid" src="img/products/<?=$pic[0]?>" alt="<?=$pro_row['title']?>">
                        </div>
                        <div class="card-body text-rights">
                            <p class="float-right"><?=$pro_row['title']?></p>
                            <p class="font-weight-bold"><?=number_format($pro_row['price'])?> تومان</p>
                        </div>
                    </div>
                    </a>
                </div>
            <?php } ?>
        </div>

        <div class="row py-5">
            <div class="col-md-3">
                <h5 class="font-weight-bold"><i class="fa fa-leaf text-success"></i> نظرات</h5>
            </div>
            <div class="col-md-9">
                <hr class="text-success">
            </div>
        </div>

        <div class="tab-content text-right border bg-white" id="comment">
            <div id="menu1" class="tab-pane active px-5 py-3">
                <h6 class="text-success font-weight-bold mb-4"><i class="fa fa-comments"></i> نقد و برسی شما در باره <?=$rows['title']?> </h6>
                <p><i class="fa fa-book-open"></i> لطفا در صورت داشتن اطلاعات نظر خود را برای دیگر کاربران بنویسید. </p>
                <p><i class="fa fa-language"></i> از ارسال نظر به زبان انگلیسی یا نوشتن فینگلیش پرهیز کنید. </p>
                <p><i class="fa fa-user-tie"></i> تمام نظرات توسط تیم مدیریت بررسی شده و پاسخ داده می‌شوند.</p>
                <div class="card border-0">
                            <div class="row">
                                <?php while($rows = $rcomments->fetch()){ ?>
                                <div class="col-12 alert alert-success">
                                    <h6><?=$rows['permission']==2?'<i class="fa fa-star text-warning"></i>':''?> <?=$rows['name'].' '.$rows['family']?></h6>
                                    <p><?=$rows['comment']?></p>
                                    <span class="float-left"><i class="fa fa-clock"></i> <?=jdate('Y/m/d',$rows['comment_date'])?> </span>
                                </div>
                                <?php } ?>
                            </div>
                </div>
                <hr>
                <?php if(isset($_SESSION['userid'])){ ?>
                <p>نظر خود را درج نمایید</p>
                        <form action="" method="post">
                        <div class="form-group">
                            <textarea class="form-control bg-light" name="comment" cols="100" rows="7"></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" name="submit" class="btn btn-success">ثبت نظر</button>
                        </div>
                        </form>
                <?php }else{?>
                    <div class="alert alert-danger">جهت ثبت نظر وارد <a href="login.php">حساب کاربری</a> خود شوید</div>
                <?php } ?>
            </div>
        </div>
        <br>
    </div>
</main>
<?php include('includes/footer.php'); ?>