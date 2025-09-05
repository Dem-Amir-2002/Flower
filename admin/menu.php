<?php
require_once "../includes/dbconfig.php";
//check new products
$pro = $conn->query("SELECT COUNT(`pid`) as count FROM `products` WHERE `status`=0");
$newpro = $pro->fetch();
?>
<img src="img/user.png" class="img-fluid" alt="" width="50" height="50">
<h5 class="font-weight-bold pt-3"><?= $_SESSION['fullname'] ?></h5>
<hr>
<!-- Menu -->
<nav class="text-right">
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="index.php">داشبورد</a>
        <i class="fas fa-home"></i>
    </div>
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="users.php">کاربران</a>
        <i class="fas fa-users"></i>
    </div>
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="aboutus.php">درباره ما</a>
        <i class="fas fa-info"></i>
    </div>
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="information.php">اطلاعات تماس</a>
        <i class="fas fa-phone"></i>
    </div>
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="contact.php" class="nav-link px-0">پیام ها</a>
        <i class="fas fa-comments"></i>
    </div>
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="comments.php">نظرات</a>
        <i class="fas fa-ticket-alt"></i>
    </div>
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="article.php">مقالات</a>
        <i class="fas fa-edit"></i>
    </div>
    <ul class="nav nav-sidebar d-flex justify-content-between p-0" data-widget="treeview">
        <li class="nav-item"><a href="" class="nav-link px-0">محصولات<i class="fas fa-caret-down mr-1 text-muted"></i></a>
            <ul class="nav nav-treeview px-2">
                <li class="nav-item"><a href="categories.php" class="nav-link py-1">دسته بندی</a></li>
                <li class="nav-item"><a href="add.php" class="nav-link py-1">افزودن محصول</a></li>
                <li class="nav-item"><a href="products.php" class="nav-link py-1">لیست محصولات</a></li>
            </ul>
        </li>
        <i class="fas fa-box-open"></i>
    </ul>
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="order.php">سفارشات</a>
        <i class="fas fa-image "></i>
    </div>
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="reports.php">گزارش‌ها</a>
        <i class="fas fa-chart-bar"></i>
    </div>
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="logout.php">خروج</a>
        <i class="fas fa-sign-out-alt "></i>
    </div>
</nav>