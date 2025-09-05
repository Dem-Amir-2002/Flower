<?php
require_once "../includes/dbconfig.php";
require_once "../includes/jdf.php";
// بررسی سطح دسترسی
if(!isset($_SESSION["permission"]) || ($_SESSION["permission"] != 1 && $_SESSION['permission'] != 2)) {
    header("location: ../index.php");
    exit();
}

/* -------------------------
   گزارش پرفروش‌ترین محصولات
------------------------- */
$q = $conn->prepare("
    SELECT p.pid, p.title, SUM(o.count) as total_sold, SUM(o.price * o.count) as total_income
    FROM orders o
    INNER JOIN products p ON o.productid = p.pid
    WHERE o.status = 1   -- فقط سفارش‌های ارسال‌شده
    GROUP BY o.productid
    ORDER BY total_sold DESC
");
$q->execute();
$total = $q->rowCount();

/* -------------------------
   گزارش محصولات ناموجود
------------------------- */
$q2 = $conn->prepare("SELECT * FROM products WHERE count = 0 ORDER BY created_at DESC");
$q2->execute();
$total2 = $q2->rowCount();
?>

<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>گزارش‌ها</title>
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
        <!-- منو -->
        <div class="col-2 admin-menu text-center bg-light py-3">
            <?php include ("menu.php"); ?>
        </div>
        
        <!-- محتوای اصلی -->
        <div class="col-10 admin-content text-right py-3">
            <h4>گزارش‌ها</h4>
            <hr>
            
            <!-- گزارش پرفروش‌ترین محصولات -->
            <h5>پرفروش‌ترین محصولات</h5>
            <table class="table table-striped table-hover text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام محصول</th>
                    <th>تعداد فروش</th>
                    <th>مجموع فروش (تومان)</th>
                </tr>
                </thead>
                <tbody>
                <?php if($total){ $count = 0; while($rows = $q->fetch()){ $count++;?>
                <tr>
                    <td><?=$count?></td>
                    <td><?=$rows['title']?></td>
                    <td><?=$rows['total_sold']?></td>
                    <td><?=number_format($rows['total_income'])?></td>
                </tr>
                <?php } } else { ?>
                <tr><td colspan="4">موردی برای نمایش وجود ندارد</td></tr>
                <?php } ?>
                </tbody>
            </table>

            <hr>

            <!-- گزارش محصولات ناموجود -->
            <h5>محصولات ناموجود</h5>
            <table class="table table-striped table-hover text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام محصول</th>
                    <th>قیمت</th>
                    <th>تاریخ ثبت</th>
                </tr>
                </thead>
                <tbody>
                <?php if($total2){ $count = 0; while($rows2 = $q2->fetch()){ $count++;?>
                <tr>
                    <td><?=$count?></td>
                    <td><?=$rows2['title']?></td>
                    <td><?=number_format($rows2['price'])?> تومان</td>
                    <td><?=jdate('Y/m/d', $rows2['created_at'])?></td>
                </tr>
                <?php } } else { ?>
                <tr><td colspan="4">هیچ محصول ناموجودی ثبت نشده است</td></tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
</body>
</html>
