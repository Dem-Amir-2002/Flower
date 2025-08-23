<?php
require_once ('dbconfig.php');
require_once ('jdf.php');
//menu
$menu = $conn->query("SELECT * FROM `categories` WHERE `parentid`=0 ORDER BY `cname` ASC");
?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- icon -->
    <script src="js/all.js"></script>
</head>
<body>
<header>
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-md-2 col-12 text-center">
                <a href="index.php"><img src="img/logo.png"></a>
            </div>
            <div class="col-md-5 col-12 m-b">
                <nav class="navbar navbar-expand-lg header-menu text-right px-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">صفحه اصلی</a>
                            </li>
                            <div class="px-2"></div>
                            <li class="nav-item dropdown">
                                <a href="products.php" class="nav-link dropdown-toggle">دسته بندی</a>
                                <div class="text-right dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <?php while($m_row = $menu->fetch()){ ?>
                                        <div class="dropdown-submenu">
                                            <a class="dropdown-item" href="products.php?cat=<?=$m_row['cid']?>"><?=$m_row['cname']?></a>
                                            <?php
                                            $submenu = $conn->query("SELECT * FROM `categories` WHERE `parentid`={$m_row['cid']} ORDER BY `cname` ASC");
                                            $total = $submenu->rowCount();
                                            if($total){
                                                ?>
                                                <div class="dropdown-menu">
                                                    <?php while($sub_row = $submenu->fetch()){ ?>
                                                        <a class="dropdown-item text-right" href="products.php?cat=<?=$sub_row['cid']?>"><?=$sub_row['cname']?></a>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </li>
                            <div class="px-2"></div>
                            <li class="nav-item">
                                <a class="nav-link" href="articles.php?cid=0">اخبار و مقالات</a>
                            </li>
                            <div class="px-2"></div>
                            <li class="nav-item">
                                <a class="nav-link" href="aboutus.php">درباره ما</a>
                            </li>
                            <div class="px-2"></div>
                            <li class="nav-item">
                                <a class="nav-link" href="contactus.php">تماس با ما</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-5 col-12 mt-2 d-flex justify-content-center">


                <a href="user/basket.php" class="btn btn-sm btn-outline-success m-1"><i class="fa fa-cart-plus"></i> سبد خرید</a>
                <div class="btn btn-sm btn-success m-1"><i class="fa fa-user"></i>
                    <?php if(isset($_SESSION['userid'])){ ?>
                         &nbsp;<a class="text-white" href="user/index.php"><?=$_SESSION['fullname']?> </a>&nbsp;
                        <span> / </span>&nbsp;
                            <a class="text-white" href="logout.php"> خروج </a>
                    <?php }else{ ?>
                        <a class="text-white" href="login.php">ورود</a>
                        <span> / </span>&nbsp;
                        <a class="text-white" href="register.php">ثبت نام</a>
                    <?php } ?>
                </div>
                <?php if(isset($_SESSION['permission']) && $_SESSION['permission']==2){ ?>
                    &nbsp;<a class="btn btn-sm btn-danger m-1" href="admin/">مدیریت</a>
                <?php } ?>
            </div>
            </div>
            </div>
</header>