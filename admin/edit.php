<?php
require_once "../includes/dbconfig.php";
//check permission
if(!isset($_SESSION["permission"]) && $_SESSION['permission'] != 2) {
    header("location: ../index.php");
    exit();
}
if(!isset($_GET['id'])) {
    header('location:add.php');
    exit();
}
$id = $_GET['id'];
//categoru
$cat = $conn->query("SELECT * FROM `categories` ORDER BY `cname` ASC");
//products
$pro = $conn->query("SELECT * FROM `products` WHERE `pid`='$id'");
$pro_row = $pro->fetch();
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
    $products = $conn->prepare("UPDATE `products` SET `catid`=?,`title`=?,`price`=?,`discount`=?,`count`=?,`color`=?,`keyfeatures`=?,`description`=? WHERE `pid`=?");
    $products->bindParam(1,$catid);
    $products->bindParam(2,$title);
    $products->bindParam(3,$price);
    $products->bindParam(4,$discount);
    $products->bindParam(5,$count);
    $products->bindParam(6,$color);
    $products->bindParam(7,$keyfeatures);
    $products->bindParam(8,$description);
    $products->bindParam(9,$id);
    if($products->execute()){
        header('location:products.php?ok');
        exit();
    }
    else{
        header('location:edit.php?id='.$id.'&error');
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
                                <option <?=$pro_row['catid']==$rowcat['cid']?'selected':''?> value="<?=$rowcat['cid']?>"><?=$rowcat['cname']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>نام محصول</label>
                        <input type="text" class="form-control" name="title" value="<?=$pro_row['title']?>" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>قیمت (تومان)</label>
                        <input type="text" class="form-control" name="price" value="<?=$pro_row['price']?>" required autocomplete="off">
                    </div>
                    <div class="col-md-3">
                        <label>تخفیف (تومان)</label>
                        <input type="text" class="form-control" name="discount" value="<?=$pro_row['discount']?>" autocomplete="off">
                    </div>
                    <div class="col-md-3">
                        <label>تعداد</label>
                        <input type="text" class="form-control" name="count" value="<?=$pro_row['count']?>" autocomplete="off">
                    </div>
                    <div class="col-md-3">
                        <label>رنگ</label>
                        <input type="text" class="form-control" name="color" value="<?=$pro_row['color']?>" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-md-6">
                        <label>ویژگی های اصلی</label>
                        <textarea type="text" rows="8" class="form-control" name="keyfeatures"><?=$pro_row['keyfeatures']?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>توضیحات</label>
                        <textarea type="text" rows="8" class="form-control" name="description"><?=$pro_row['description']?></textarea>
                    </div>
                </div>
                <div class="text-left">
                    <button type="submit" class="btn btn-primary" name="btn_save">ویرایش</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>