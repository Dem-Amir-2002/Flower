<?php
require_once('dbconfig.php');
require_once('jdf.php');
//menu
$menu = $conn->query("SELECT * FROM `categories` WHERE `parentid`=0 ORDER BY `cname` ASC");
?>
<!doctype html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body.dark-mode {
            background: #121212;
            color: #e0e0e0;
        }

        body.dark-mode a {
            color: #90caf9 !important;
        }

        body.dark-mode .text-dark {
            color: #ffffff !important;
        }


        body.dark-mode .card,
        body.dark-mode .navbar,
        body.dark-mode .dropdown-menu,
        body.dark-mode .alert,
        body.dark-mode .custombg,
        body.dark-mode .modal-content {
            background: #1e1e1e !important;
            color: #e0e0e0 !important;
        }

        body.dark-mode .img-thumbnail,
        body.dark-mode .form-control,
        body.dark-mode .input-group-text,
        body.dark-mode .table {
            background: #222 !important;
            color: #e0e0e0 !important;
            border-color: #333 !important;
        }

        body {
            transition: background .2s ease, color .2s ease;
        }
    </style>

    <!-- icon -->
    <script src="js/all.js"></script>
</head>



<body class="dark-mode">
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
                                        <?php while ($m_row = $menu->fetch()) { ?>
                                            <div class="dropdown-submenu">
                                                <a class="dropdown-item" href="products.php?cat=<?= $m_row['cid'] ?>"><?= $m_row['cname'] ?></a>
                                                <?php
                                                $submenu = $conn->query("SELECT * FROM `categories` WHERE `parentid`={$m_row['cid']} ORDER BY `cname` ASC");
                                                $total = $submenu->rowCount();
                                                if ($total) {
                                                ?>
                                                    <div class="dropdown-menu">
                                                        <?php while ($sub_row = $submenu->fetch()) { ?>
                                                            <a class="dropdown-item text-right" href="products.php?cat=<?= $sub_row['cid'] ?>"><?= $sub_row['cname'] ?></a>
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

                    <!-- دکمه چت بات -->
                    <a href="chatbot.php" class="btn btn-sm btn-info m-1">
                        <i class="fa fa-robot"></i> چت‌بات
                    </a>


                    <!-- دکمه تغییر حالت تاریک/روشن -->
                    <button id="darkModeToggle" type="button" class="btn btn-sm btn-secondary m-1" aria-pressed="false">
                        <i class="fa fa-moon"></i> حالت شب
                    </button>

                    <a href="user/basket.php" class="btn btn-sm btn-outline-success m-1"><i class="fa fa-cart-plus"></i> سبد خرید</a>
                    <div class="btn btn-sm btn-success m-1"><i class="fa fa-user"></i>
                        <?php if (isset($_SESSION['userid'])) { ?>
                            &nbsp;<a class="text-white" href="user/index.php"><?= $_SESSION['fullname'] ?> </a>&nbsp;
                            <span> / </span>&nbsp;
                            <a class="text-white" href="logout.php"> خروج </a>
                        <?php } else { ?>
                            <a class="text-white" href="login.php">ورود</a>
                            <span> / </span>&nbsp;
                            <a class="text-white" href="register.php">ثبت نام</a>
                        <?php } ?>
                    </div>
                    <?php if (isset($_SESSION['permission']) && $_SESSION['permission'] == 2) { ?>
                        &nbsp;<a class="btn btn-sm btn-danger m-1" href="admin/">مدیریت</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>

    <script>
        (function() {
            var LS_KEY = 'darkMode';
            var body = document.body;
            var btn = document.getElementById('darkModeToggle');

            if (!btn) return; // اگر دکمه‌ای نبود، هیچ کاری نکن

            function setButtonLabel() {
                var darkOn = body.classList.contains('dark-mode');
                btn.innerHTML = darkOn ?
                    '<i class="fa fa-sun"></i> حالت روز' :
                    '<i class="fa fa-moon"></i> حالت شب';
                btn.setAttribute('aria-pressed', darkOn ? 'true' : 'false');
            }

            // حالت اولیه را دقیق از localStorage اعمال کن
            var saved = localStorage.getItem(LS_KEY);
            if (saved === 'enabled') {
                body.classList.add('dark-mode');
            } else {
                body.classList.remove('dark-mode');
            }
            setButtonLabel();

            // فقط روی همین دکمه واکنش نشان بده
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); // جلوی bubble شدن به لیسنرهای کلی عمومی را می‌گیرد
                var darkNow = body.classList.toggle('dark-mode');
                localStorage.setItem(LS_KEY, darkNow ? 'enabled' : 'disabled');
                setButtonLabel();
            }, false);
        })();
    </script>

</body>