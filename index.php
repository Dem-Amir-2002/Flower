<?php
$title = 'فروشگاه گل و گیاه';
include('includes/header.php');
//slider
$slider = $conn->query("SELECT * FROM `slider`");
$srows = $slider->fetchAll();
//last products
$products = $conn->query("SELECT * FROM `products` WHERE `status`=1 ORDER BY `created_at` DESC LIMIT 16");
//discount product
$discount = $conn->query("SELECT * FROM `products` WHERE `discount`>0 ORDER BY `created_at` DESC LIMIT 16");
//articles
$articles = $conn->query("SELECT * FROM `articles` ORDER BY `created_at` DESC LIMIT 10");
//categories
$cat = $conn->query("SELECT * FROM `categories` ORDER BY `cname` ASC");
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6 pt-5">
                <h1 class="mt-4 mb-4 text-right">اکسیژن رو به خونت هدیه بده!</h1>
                <div class="d-flex text-justify">
                    <div class="vr text-success" style="border-left:3px solid"></div>
                    <p class="px-3">به دنیای سرسبز ما خوش آمدید! <br>
                        در اینجا می‌توانید مجموعه‌ای زیبا از گیاهان و گل‌های تازه را پیدا کنید که هر فضایی را دلنشین می‌کنند. فرقی نمی‌کند به دنبال هدیه‌ای خاص هستید یا می‌خواهید گوشه‌ای از طبیعت را به خانه خود بیاورید، ما برای هر سلیقه‌ای گزینه‌ای داریم. <br>با ما، زندگی خود را سبزتر کنید.
                    </p>
                </div>
                <div class="text-start m-3">
                    <a href="products.php" class="btn btn-success">مشاهده محصولات <i class="fa fa-tag"></i> </a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="img/img-hero1.png" class="img-fluid">
            </div>
            <div class="col-md-2">
                <div class="d-flex">
                    <i class="fas fa-seedling fa-3x text-success"></i>
                    <div class="px-2 text-right">
                        <span class="font-weight-bold">خاص ترین گیاهان</span>
                        <p class="small">خرید نایاب ترین گیاهان</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex">
                    <i class="fas fa-comment-dollar fa-3x text-success"></i>
                    <div class="px-2 text-right">
                        <span class="font-weight-bold"> بهترین قیمت </span>
                        <p class="small"> بهترین قیمت در میان رقبا </p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex">
                    <i class="fab fa-pagelines fa-3x text-success"></i>
                    <div class="px-2 text-right">
                        <span class="font-weight-bold"> گیاهان آپارتمانی </span>
                        <p class="small"> بهترین گیاهان آپارتمانی </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5 p-4 bg-body rounded shadow-sm text-center">
            <?php while ($crows = $cat->fetch()) { ?>
                <div class="col-md-2 col-6">
                    <a href="products.php?cat=<?= $crows['cid'] ?>">
                        <img class="shadow-sm p-2 img-thumbnail btn btn-outline-light" src="img/cat/<?= $crows['pic'] ?>">
                        <h6 class="mt-2 text-muted"><?= $crows['cname'] ?></h6>
                    </a>
                </div>
            <?php } ?>
        </div>

        <!-- -->
        <div class="row py-5">
            <div class="col-md-3">
                <h5 class="font-weight-bold"><i class="fa fa-leaf text-success"></i> محصولات تخفیف دار!</h5>
            </div>
            <div class="col-md-9">
                <hr class="text-success">
            </div>
        </div>
        <!-- -->
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme colleague carousel-indicator">
                    <?php while ($drows = $discount->fetch()) {
                        $pic = explode(',', $drows['images']); ?>
                        <div class="col-md-12 col-12 bg-white p-2 rounded-2 hover-border">
                            <a href="details.php?id=<?= $drows['pid'] ?>">
                                <div class="d-flex justify-content-center">
                                    <img src="img/products/<?= $pic[0] ?>" alt="<?= $drows['title'] ?>" class="img-thumbnail w-75 img-fluid">
                                </div>
                                <p class="text-center mt-2 fw-bold text-success"><?= $drows['title'] ?></p>
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="text-end text-decoration-line-through text-danger"><?= number_format($drows['price']) ?> تومان</span>
                                    <span class="text-start text-dark"><?= number_format($drows['discount']) ?> تومان</span>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- -->
    </div>

    <div class="container">

        <div class="row py-5">
            <div class="col-md-4">
                <div class="mb-3 alert alert-success">
                    <div class="row p-1">
                        <div class="col-md-4 mt-2 text-center"><img src="img/2.png"></div>
                        <div class="col-md-8">
                            <h6 class="text-dark fw-bold">امکان مرجوع کردن کالا تا یک هفته</h6>
                            <span>شما در سایت ما این امکان را دارید که تا یک هفته بعد از خرید ، محصول خود را برگشت یزنید.</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3 alert alert-danger">
                    <div class="row p-1">
                        <div class="col-md-4 mt-2 text-center"><img src="img/1.png"></div>
                        <div class="col-md-8">
                            <h6 class="text-dark fw-bold"> خرید انواع مدل های کود گیاهان </h6>
                            <span>شما در سایت ما این امکان را دارید که انواع مختلف و مدل های گوناگونی از کودهای گیاهی ما را مشاهده و خریداری کنید.</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3 alert alert-primary">
                    <div class="row p-1">
                        <div class="col-md-4 mt-2 text-center"><img src="img/3.png"></div>
                        <div class="col-md-8">
                            <h6 class="text-dark fw-bold"> زیبا ترین گلدان های تزئینی </h6>
                            <span>شما در سایت ما این امکان را دارید که گلدان های تزیینی زیادی را مشاهده و از بین انها زیباترینشان را انتخاب کنید.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row rounded whyus mt-5 mb-5">
            <div class="col-md-7">
                <h1 class="mt-4 mb-4 text-right">چرا سایت فروشگاه گل و گیاه؟</h1>
                <div class="d-flex text-justify">
                    <div class="vr text-success" style="border-left:3px solid"></div>
                    <p class="px-3">فروشگاه گل و گیاه، جایی است که زیبایی طبیعت به خانه شما می‌آید. ما با تضمین کیفیت و ارسال سریع، بهترین و تازه‌ترین گل‌ها و گیاهان را برای شما فراهم می‌کنیم. همچنین، مشاوره رایگان ما به شما کمک می‌کند تا بهترین انتخاب را داشته باشید و از نگهداری گیاهان خود لذت ببرید. <br> با ما، طبیعت همیشه در دسترس شماست.
                    </p>
                </div>
                <div class="row mt-5 p-3">
                    <div class="col-md-4">
                        <div class="d-flex alert alert-light">
                            <i class="fa fa-bug fa-2x text-danger"></i>
                            <div class="px-1">
                                <h6 class="small fw-bold mb-0">انواع سم ها</h6>
                                <span class="small">قوی ترین سم حشرات</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex alert alert-light">
                            <i class="fa fa-dollar-sign fa-2x text-warning"></i>
                            <div class="px-2">
                                <h6 class="small fw-bold mb-0">بهترین قیمت</h6>
                                <span class="small">منصفانه ترین قیمت بازار</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex alert alert-light">
                            <i class="fa fa-star fa-2x text-success"></i>
                            <div class="px-1">
                                <h6 class="small fw-bold mb-0">کیفیت بالا</h6>
                                <span class="small">با کیفیت ترین گیاهان</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 text-center">
                <img class="img-fluid" style="margin-top: -100px" src="img/man-flower-pic2.png">
            </div>
        </div>
        <!-- -->
        <div class="row py-5">
            <div class="col-md-3">
                <h5 class="font-weight-bold"><i class="fa fa-leaf text-success"></i> جدیدترین محصولات </h5>
            </div>
            <div class="col-md-9">
                <hr class="text-success">
            </div>
        </div>
        <!-- -->
        <div class="row pb-2">
            <div class="col-md-12 text-right">
                <div class="col-md-12">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                        <div class="carousel-inner">
                            <?php
                            $count = 0;
                            while ($rows = $products->fetch()) {
                                $pic = explode(',', $rows['images']);
                                $active = '';
                                if ($count % 4 == 0) {
                                    $active = ($count == 0) ? 'active' : '';
                                    if ($count != 0) {
                                        echo '</div></div>';
                                    }
                                    echo '<div class="item carousel-item ' . $active . '">';
                                    echo '<div class="row" style="margin:10px auto;padding: 10px 40px;">';
                                }
                            ?>
                                <div class="col-md-3 mb-2">
                                    <div class="card p-3">
                                        <div class="img-box">
                                            <img src="img/products/<?= $pic['0'] ?>" class="img-thumbnail img-fluid" alt="<?= $rows['title'] ?>">
                                        </div>
                                        <div>
                                            <h6 class="small font-weight-bold"><?= $rows['title'] ?></h6>
                                            <p class="item-price"><b><?= number_format($rows['price']) ?> تومان </b></p>
                                            <a href="details.php?id=<?= $rows['pid'] ?>" class="btn btn-sm btn-success">جزئیات</a>
                                            <a href="details.php?id=<?= $rows['pid'] ?>&buy" class="btn btn-sm btn-danger">خرید</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $count++;
                            }
                            if ($count > 0) {
                                echo '</div></div>';
                            }
                            ?>
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="custombg rounded p-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div>
                        <h3>خودت گیاهت رو بکار و رشدش بده!!!</h3>
                        <span>خریــــد انواع دانه و بذر گیاهان</span>
                    </div>
                    <img class="img-fluid w-25" src="img/img1-grow-plant.png">
                </div>
            </div>
            <div class="col-md-6">
                <div class="custombg rounded p-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div>
                        <h2>خونت رو زیبا کن!</h2>
                        <span>جذاب ترین گلدان ها</span>
                    </div>
                    <img class="img-fluid w-25" src="img/img2-grow-plant.png">
                </div>
            </div>
        </div>
        <!-- -->
        <div class="row py-5">
            <div class="col-md-3">
                <h5 class="font-weight-bold"><i class="fa fa-leaf text-success"></i> آخرین مقالات</h5>
            </div>
            <div class="col-md-9">
                <hr class="text-success">
            </div>
        </div>
        <!-- -->
        <div class="row pb-5">
            <?php while ($rows = $articles->fetch()) {
                $pic = explode(',', $rows['pic']);
            ?>
                <div class="col-md-6 py-2">
                    <a href="show.php?id=<?= $rows['id'] ?>">
                        <div class="card p-2 btn btn-outline-success">
                            <div class="d-flex">
                                <img class="img-fluid img-thumbnail w-25 col-md-2" src="img/article/<?= $rows['pic'] ?>" alt="<?= $rows['title'] ?>">
                                <div class="card-body text-start">
                                    <h6 class="fw-bold"><?= $rows['title'] ?></h6>
                                    <p class="text-justify-custom"><?= mb_substr($rows['short'], 0, 170) ?>...</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <!-- -->
    </div>
</main>

<?php include('includes/footer.php'); ?>