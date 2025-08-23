<?php
require_once "../includes/dbconfig.php";
//check permission
if(!isset($_SESSION["permission"]) && $_SESSION["permission"] != 1 || $_SESSION['permission'] != 2) {
header("location: ../index.php");
    exit();
}

//count of users
$allusers = $conn->query("SELECT * FROM users");
$total_user = $allusers->rowCount();

//count of products
$allproducts = $conn->query("SELECT * FROM products");
$total_product = $allproducts->rowCount();

//count of comment
$allcomments = $conn->query("SELECT * FROM comments");
$total_comments = $allcomments ->rowCount();

//count of contact
$alltickets = $conn->prepare("SELECT * FROM contact");
$total_contact = $alltickets->rowCount();

//count of articles
$allnews = $conn->query("SELECT * FROM `articles`");
$total_news = $allnews->rowCount();
//count of articles
$orders = $conn->query("SELECT * FROM `orders`");
$total_orders = $orders->rowCount();
//get all data from comments
$q = $conn->prepare("SELECT * FROM `comments` 
    INNER JOIN `products` ON `comments`.`proid`=`products`.`pid` 
    LEFT JOIN `users` ON `comments`.`userid`=`users`.`ID` 
    ORDER BY `comments`.`comment_date` DESC LIMIT 20");
$q->execute();
$total = $q->rowCount();
//delete
if(isset($_GET['del'])){
    $id = $_GET['id'];
    $del = $conn->prepare("DELETE FROM `comments` WHERE `comment_id`='$id'");
    $del->execute();
    header('location:index.php?ok');
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
    <!-- icon -->
    <script src="js/all.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 admin-menu text-center bg-light py-3">
            <?php include ("menu.php"); ?>
        </div>
        <div class="col-md-10 admin-content text-right py-3">
            <h4>داشبورد کاربری</h4>
            <span class="text-muted">به پنل مدیریت خوش آمدید</span>
            <hr>
            <div class="row pb-4">
                <div class="col-4">
                    <div class="card bg-gradient-dark shadow-sm">
                        <div class="card-body text-center">
                            <p class="text-right">تعداد کاربران</p>
                            <h4 class="font-weight-bold"><?=$total_user?></h4>
                            <span>نفر</span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-gradient-primary shadow-sm">
                        <div class="card-body text-center">
                            <p class="text-right">تعداد مقالات</p>
                            <h4 class="font-weight-bold"><?=$total_news?></h4>
                            <span>مورد</span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-gradient-secondary shadow-sm">
                        <div class="card-body text-center">
                            <p class="text-right">تعداد نظرات</p>
                            <h4 class="font-weight-bold"><?=$total_comments?></h4>
                            <span>مورد</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="card bg-gradient-success shadow-sm">
                        <div class="card-body text-center">
                            <p class="text-right">تعداد پیام ها</p>
                            <h4 class="font-weight-bold"><?=$total_contact?></h4>
                            <span>مورد</span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-gradient-warning shadow-sm">
                        <div class="card-body text-center">
                            <p class="text-right">تعداد محصولات</p>
                            <h4 class="font-weight-bold"><?=$total_product?></h4>
                            <span>مورد</span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-gradient-danger shadow-sm">
                        <div class="card-body text-center">
                            <p class="text-right">تعداد سفارشات</p>
                            <h4 class="font-weight-bold"><?=$total_orders?></h4>
                            <span>مورد</span>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-12 admin-content text-right py-3">
            <h4>آخرین نظرات</h4>
            <table class="table table-striped table-hover text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام</th>
                    <th>محصول</th>
                    <th>پیام</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php if($total){ $count = 0; while($rows = $q->fetch()) { $count++;?>
                    <tr>
                        <td><?=$count?></td>
                        <td><?=$rows['name'].' '.$rows['family']?></td>
                        <td><?=mb_substr($rows['title'],0,50)?>...</td>
                        <td><?=$rows['comment']?></td>
                        <td>
                            <a href="../details.php?id=<?=$rows['pid']?>#comment" target="_blank" class="btn btn-xs btn-primary">پاسخ</a>
                            <a href="index.php?id=<?=$rows['comment_id']?>&del" class="btn btn-xs btn-danger">حذف</a>
                        </td>
                    </tr>
                <?php } } else {?>
                    <tr><td colspan="5">محتوایی جهت نمایش موجود نمی باشد.</td></tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>