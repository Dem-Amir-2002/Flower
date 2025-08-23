<?php
require_once "../includes/dbconfig.php";
require_once "../includes/jdf.php";
//check permission
if(!isset($_SESSION["permission"]) && $_SESSION['permission'] != 2) {
    header("location: ../index.php");
    exit();
}
$now = time();
//new order
$norder = $conn->prepare("SELECT *,orders.count as ocount FROM `orders` 
    INNER JOIN `products` ON `orders`.`productid`=`products`.`pid` 
    INNER JOIN `users` ON `users`.`ID`=`orders`.`userid` WHERE `orders`.`status`=0");
$norder->execute();
$ntotal = $norder->rowCount();
//complete order
$lorder = $conn->prepare("SELECT * , orders.count as ocount FROM `orders` INNER JOIN `products` ON `orders`.`productid`=`products`.`pid` INNER JOIN `users` ON `users`.`ID`=`orders`.`userid` WHERE `orders`.`status`=1");
$lorder->execute();
$ltotal = $lorder->rowCount();
if(isset($_GET['full'])){
    $id = $_GET['id'];
    $q = $conn->prepare("UPDATE `orders` INNER JOIN `products` ON `products`.`pid`=`orders`.`productid` SET `orders`.`status`=1,`update_date`='$now' WHERE `id`=$id");
    if($q->execute()){
        header('location:order.php?ok');
        exit();
    }
}
if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $order = $conn->query("SELECT * FROM `orders` WHERE `id`='$id'");
    $q = $conn->prepare("DELETE FROM `orders` WHERE `id`=$id");
    if($q->execute()){
        $row = $order->fetch();
        $count = $row['count'];
        $proid = $row['productid'];
        $conn->query("UPDATE `products` SET `count`=`count`+'$count' WHERE `pid`='$proid'");
        header('location:order.php?ok');
        exit();
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
            <h4>سفارشات</h4>
            <hr>
            <ul class="nav nav-tabs nav-justified border-bottom-0">
                <li class="nav-item"><a data-toggle="tab" class="nav-link text-dark active" href="#tab1">جدیدترین</a></li>
                <li class="nav-item"><a data-toggle="tab" class="nav-link text-dark" href="#tab2">تکمیل شده</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab1" class="tab-pane active">
                    <table class="table table-striped table-hover text-center">
                        <thead>
                        <tr>
                            <th>کد</th>
                            <th>سفارش دهنده</th>
                            <th>نام محصول</th>
                            <th>تعداد سفارش</th>
                            <th>مبلغ</th>
                            <th>جمع</th>
                            <th>تاریخ ثبت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($ntotal) { while($nrows = $norder->fetch()) { ?>
                        <tr>
                            <td>#</td>
                            <td><?=$nrows['name'].' '.$nrows['family']?></td>
                            <td><?=$nrows['title']?></td>
                            <td><?=$nrows['ocount']?></td>
                            <td><?=number_format($nrows['price'])?> تومان</td>
                            <td><?=number_format($nrows['ocount']*$nrows['price'])?> تومان</td>
                            <td><?=jdate('Y,m,d',$nrows['order_date'])?></td>
                            <td>
                                <a href="order.php?id=<?=$nrows['id']?>&full" class="btn btn-sm btn-primary">تکمیل</a>
                                <a href="order.php?id=<?=$nrows['id']?>&delete" class="btn btn-sm btn-danger" onclick="return confirm('آیا از حذف اطمیان دارید؟ این عمل غیر قابل بازگشت می باشد.')">حذف</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                        <tr><td colspan="8">محتوایی جهت نمایش موجود نمی باشد.</td></tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div id="tab2" class="tab-pane fade">
                    <table class="table table-striped table-hover text-center">
                        <thead>
                        <tr>
                            <th>کد</th>
                            <th>سفارش دهنده</th>
                            <th>نام محصول</th>
                            <th>تعداد سفارش</th>
                            <th>مبلغ</th>
                            <th>تاریخ ثبت</th>
                            <th>تاریخ تکمیل</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($ltotal) { while($lrows = $lorder->fetch()) { ?>
                            <tr>
                                <td>#</td>
                                <td><?=$lrows['name'].' '.$lrows['family']?></td>
                                <td><?=$lrows['title']?></td>
                                <td><?=$lrows['ocount']?></td>
                                <td><?=number_format($lrows['ocount']*$lrows['price'])?> تومان</td>
                                <td><?=jdate('Y,m,d',$lrows['order_date'])?></td>
                                <td><?=jdate('Y,m,d',$lrows['update_date'])?></td>
                            </tr>
                        <?php }}else{ ?>
                            <tr><td colspan="7">محتوایی جهت نمایش موجود نمی باشد.</td></tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>