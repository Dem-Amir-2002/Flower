<?php
require_once "../includes/dbconfig.php";
//check permission
if(!isset($_SESSION["permission"]) && $_SESSION["permission"] != 1 || $_SESSION['permission'] != 2) {
    header("location: ../index.php");
    exit();
}
//categoru
$cat = $conn->query("SELECT * FROM `categories` ORDER BY `cname` ASC");
//submit data
if(isset($_POST['btn_save'])) {
    $catid = $_POST['cat'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $count = $_POST['count'];
    $color = $_POST['color'];
    $keyfeatures = $_POST['keyfeatures'];
    $description = $_POST['description'];
    $status = 1;
    $pic = '';
    if(!empty($_FILES['pic']['name'][0])){
        $count = count($_FILES['pic']['name']);
        for($i=0;$i<$count;$i++){
            $pic .= time().$_FILES['pic']['name'][$i].',';
        }
    }
    $pic = substr($pic,0,-1);
    $now = time();
    $products = $conn->prepare("INSERT INTO `products` (`catid`,`title`,`price`,`discount`,`count`,`color`,`keyfeatures`,`description`,`images`,`status`,`created_at`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $products->bindParam(1,$catid);
    $products->bindParam(2,$title);
    $products->bindParam(3,$price);
    $products->bindParam(4,$discount);
    $products->bindParam(5,$count);
    $products->bindParam(6,$color);
    $products->bindParam(7,$keyfeatures);
    $products->bindParam(8,$description);
    $products->bindParam(9,$pic);
    $products->bindParam(10,$status);
    $products->bindParam(11,$now);
    if($products->execute()){
        if(!empty($_FILES['pic']['name'][0])){
            $count = count($_FILES['pic']['name']);
            for($i=0;$i<$count;$i++){
               move_uploaded_file($_FILES['pic']['tmp_name'][$i],'../img/products/'.time().$_FILES['pic']['name'][$i]);
            }
        }
        header('location:add.php?op=ok');
        exit();
    }
    else{
        header('location:add.php?op=error');
        exit();
    }
}

//message
if(isset($_GET['op'])){
    switch ($_GET['op']){
        case 'ok':
            $message = '<div class="alert alert-success">عملیات با موفقیت انجام شد.</div>';
            break;
        case 'error':
            $message = '<div class="alert alert-danger">مشکلی پیش آمده مجدد تلاش نمایید.</div>';
            break;
    }
}
?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <!-- js -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/adminlte.min.js"></script>
    <!-- js sweetalert2 -->
    <script src="js/sweetalert2@11.js"></script>
    <!-- icon -->
    <script src="js/all.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 admin-menu text-center bg-light py-3">
            <?php
            include("menu.php");
            ?>
        </div>
        <div class="col-10 admin-content text-right py-3">
            <h4>افزودن محصول</h4>
            <hr>
            <?=@$message?>
            <form action="" method="POST" enctype="multipart/form-data" >
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>گروه</label>
                        <select name="cat" class="form-control" required>
                            <option value="">انتخاب کنید</option>
                            <?php while($rowcat = $cat->fetch()){ ?>
                                <option value="<?=$rowcat['cid']?>"><?=$rowcat['cname']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>نام محصول</label>
                        <input type="text" class="form-control" name="title" placeholder="نام محصول" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>قیمت (تومان)</label>
                        <input type="text" class="form-control" name="price" placeholder="قیمت به تومان" required autocomplete="off">
                    </div>
                    <div class="col-md-3">
                        <label>تخفیف (تومان)</label>
                        <input type="text" class="form-control" name="discount" placeholder="تخفیف به تومان" required autocomplete="off">
                    </div>
                    <div class="col-md-3">
                        <label>تعداد</label>
                        <input type="text" class="form-control" name="count" autocomplete="off">
                    </div>
                    <div class="col-3">
                        <label>رنگ بندی</label>
                        <input type="text" class="form-control" name="color" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-md-6">
                        <label>ویژگی های اصلی</label>
                        <textarea type="text" rows="8" class="form-control" name="keyfeatures"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>توضیحات</label>
                        <textarea type="text" rows="8" class="form-control" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-md-12">
                        <label>انتخاب عکس</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="pic[]" multiple>
                            <label class="custom-file-label text-center">انتخاب عکس</label>
                        </div>
                    </div>
                </div>
                <div class="text-left">
                    <button type="submit" class="btn btn-success" name="btn_save">ثبت محصول</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>