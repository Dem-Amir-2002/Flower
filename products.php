<?php
$title = 'فروشگاه گل و گیاه';
include('includes/header.php');
$where ='';
if(isset($_GET['title'])  && !empty($_GET['title']) ){
    $title = $_GET['title'];
    $where .= " AND `title` LIKE '%$title%' OR `description` LIKE '%$title%'";
}
if(isset($_GET['cat']) && !empty($_GET['cat'])){
    $catid = $_GET['cat'];
    $where .= " AND `catid`='$catid' ";
}
if(isset($_GET['range']) && $_GET['range']!=1180000){
    $price = $_GET['range'];
    $where .= " AND `price`<='$price' ";
}
$cat = $conn->query("SELECT * FROM `categories` ORDER BY `cname` ASC");
//prodocts list
$products = $conn->query("SELECT * FROM `products` WHERE TRUE $where AND `status`=1 ORDER BY `created_at` DESC");
$total = $products->rowCount();
?>
<main>
    <div class="container">
        <!-- -->
        <!-- -->
        <div class="row mt-5 pb-5">
            <div class="col-md-3">
                <form action="" method="get">
                    <div class="form-group p-2">
                        <input name="title" class="form-control" placeholder="عنوان محصول">
                    </div>
                    <div class="form-group p-2">
                        <select name="cat" class="form-control">
                            <option value="">دسته بندی محصولات</option>
                            <?php while ($crows = $cat->fetch()){ ?>
                                <option value="<?=$crows['cid']?>"><?=$crows['cname']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group p-2">
                        <div class="px-3 pt-2 bg-white border">
                            <label for="priceRange" class="form-label">قیمت: <span id="priceValue">50000</span> تومان</label>
                            <input type="range" name="range" class="form-range" min="350000" max="2000000" step="10000" id="priceRange">
                        </div>
                    </div>
                    <div class="form-group p-2">
                        <button type="submit" class="btn btn-success w-100">جستجو</button>
                    </div>
                </form>
            </div>
            <div class="col-md-9">
                <div class="row">
            <?php if($total){ while($p_rows = $products->fetch()){
                $pic = explode(',',$p_rows['images']);
                ?>
                <div class="col-md-4 py-2">
                <a href="details.php?id=<?=$p_rows['pid']?>">
                    <div class="card text-right btn btn-outline-secondary border-success">
                        <div class="d-flex justify-content-center p-2">
                        <img class="card-img-top img-thumbnail img-fluid" src="img/products/<?=$pic[0]?>" alt="<?=$p_rows['title']?>">
                        </div>
                        <div class="card-body">
                            <p class="fw-bold"><?=$p_rows['title']?></p>
                            <p><?=number_format($p_rows['price'])?> تومان</p>
                            <?php if($p_rows['discount']>0){ ?>
                            <p class="float-left font-weight-bold"><?=number_format($p_rows['discount'])?> تومان</p>
                            <?php } ?>
                        </div>
                    </div>
                </a>
                </div>
            <?php }
            }else{ ?>
                <div class="col-md-12 text-center">
                    <img src="img/empty.png" alt="" width="350">
                    <p class="font-weight-bold">محتوایی جهت نمایش موجود نمی باشد!</p>
                </div>
        <?php } ?>
            </div>
            </div>
        </div>
        <!-- -->

        <!-- -->
    </div>
</main>
<?php include('includes/footer.php'); ?>