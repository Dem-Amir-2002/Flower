<?php require_once('../includes/dbconfig.php');?>
<?php
$userid = $_SESSION['userid'];
if(isset($_POST['payment'])){
    $_SESSION['check'] = count($_POST['proid']);
    $_SESSION['totalp'] = $_POST['totalp'];
    $_SESSION['price'] = @$_POST['price'];
    $_SESSION['proid'] = @$_POST['proid'];
    $_SESSION['count'] = @$_POST['count'];
    }
    /*var_dump($_SESSION);
    die;*/
    if(isset($_POST['submit'])){
    for($i=0;$i<$_SESSION['check'];$i++) {
        if(isset($_SESSION['proid'][$i])){
            $price = @$_SESSION['price'][$i];
            $proid = @$_SESSION['proid'][$i];
            $count = @$_SESSION['count'][$i];
            $status = 0;
            $now = time();
            $q = $conn->prepare("INSERT INTO `orders` (`productid`,`userid`,`price`,`count`,`status`,`order_date`) VALUES (?,?,?,?,?,?)");
            $q->bindParam(1, $proid);
            $q->bindParam(2, $userid);
            $q->bindParam(3, $price);
            $q->bindParam(4, $count);
            $q->bindParam(5, $status);
            $q->bindParam(6, $now);
            if($q->execute()){
                $conn->query("UPDATE `products` SET `count`=`count`-'$count' WHERE `pid`='$proid'");
            }
        }
    }
    unset($_SESSION['basket']);
    header('location:../user/basket.php?ok');
    exit();
}
if(isset($_POST['Cancel'])){
header("location: unsuccess.php");
}
?>
<!DOCTYPE html>
<html lang="fa_IR">

<!-- Mirrored from sep.shaparak.ir/OnlinePG/SendToken?token=7fc84b76d9bd400e98fdbf1dae4b6f46 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jan 2024 14:34:29 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>

    <style>

        @font-face {
            font-family: MyFont;
            src: url('../fonts/IRANSansWeb(FaNum).eot');
            src: url('../fonts/IRANSansWeb(FaNum).eot?#iefix') format('embedded-opentype'),
            url('../fonts/IRANSansWeb(FaNum).woff2') format('woff2'),
            url('../fonts/IRANSansWeb(FaNum).woff') format('woff'),
            url('../fonts/IRANSansWeb(FaNum).ttf') format('truetype');
        }
        *{
            font-family: MyFont,serif;
        }
        body{
            font-family: MyFont,serif;

        }
    </style>


    <title>درگاه پرداخت اینترنتی سِپ - پرداخت الکترونیک سامان</title>

    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge,10,11" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <meta name="description" content="درگاه پرداخت اینترنتی سِپ" />

    <meta name="robots" content="noindex, nofollow" />
    <meta name="language" content="fa_IR" />
    <link rel="icon" type="image/png" sizes="16x16" href="https://sep.shaparak.ir/OnlinePG/bundle/fav/favicon-16x16.png" />
    <link href="style.css" rel="stylesheet"/>
    <script src="../js/all.js"></script>
</head>

<body>

<div class="header">
    <div class="container">
        <div class="nav">
            <h1 class="title show-sm">درگاه پرداخت اینترنتی زرین پال</h1>
        </div>
        <div class="card">
            <h1 class="hide-sm">درگاه پرداخت اینترنتی زرین پال</h1>
            <div class="timer-holder show-sm">
                <div class="purchase-timer">
                    <h2>زمان باقی‌مانده:</h2>
                    <mark class="timer" id="timer1">00:00</mark>
                </div>
            </div>
            <!--            <i class="icn-shaparak-logo"></i>-->
        </div>
    </div>
</div>
<div class="main" data-culture="fa" data-version="">
    <div class="container">
        <div class="purchase">
            <div class="row reverse auto-flow">
                <div class="col col-4">
                    <div class="card">

                        <div class="purchase-timer hide-sm" data-timeout="240000">
                            <h2>زمان باقی‌مانده:</h2>
                            <mark class="timer" id="timer">00:00</mark>
                        </div>
                        <div class="merchant">
                            <div class="merchant-logo">
                                <img src="../img/zarrinpal.png" alt="merchant-logo" />
                            </div>
                            <div class="merchant-name">
                                <span><i class="fa fa-user"></i> پذیرنده</span>
                                <h4>فروشگاه گل و گیاه</h4>

                            </div>
                            <div class="purchase-value">
                                <div class="value">
                                    <span><i class="fa fa-dollar-sign"></i> مبلغ</span>
                                    <h4><?=number_format(@$_SESSION['totalp'])?> تومان</h4>

                                </div>
                                <div class="letters"></div>
                            </div>
                            <div class="merchant-info">
                                <div class="item">
                                    <span><i class="fas fa-credit-card"></i> پرداخت یار</span>
                                    <em>زرین پال</em>
                                </div>
                                <div class="item">
                                    <span><i class="fa fa-list"></i> شماره پذیرنده / ترمینال</span>
                                    <em>14729305 / 13637249</em>
                                </div>
                                <div class="item">
                                    <span><i class="fa fa-globe"></i> سایت پذیرنده</span>
                                    <em>site.com</em>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col col-8">
                    <div class="card">

                        <div class="head hide-sm">
                            <h2>اطلاعات کارت خود را وارد کنید</h2>
                        </div>
                        <form action="" autocomplete="off" class="form" id="frmPayment" method="post">
                            <input name="__RequestVerificationToken" type="hidden" value="" />
                            <input id="Action" name="Action" type="hidden" value="pay" class="ignore" />
                            <input id="Culture" name="Culture" type="hidden" value="fa" class="ignore" />
                            <div class="row">
                                <div class="col col-12">
                                    <label>شماره کارت</label>
                                    <div class="input-holder has-action">
                                        <input autocomplete="off" class="mono" data-focus="Cvv2" data-label="شماره کارت" data-name="PanNumber" data-val="true" data-val-cardnumbervalidations="شماره کارت اشتباه است" data-val-cardnumbervalidations-invalidcardnumber="شماره کارت اشتباه است" data-val-required="شماره کارت الزامی است" dir="ltr" id="CardNumber_PanString" inputmode="numeric" maxlength="19" minlength="16" name="CardNumber.PanString" placeholder="____ ____ ____ ____" type="tel" value="" />
                                        <div class="action" data-relation="CardList">
                                            <!--          <i class="icn-cards"></i>-->
                                        </div>
                                        <i class="icn-xcross clear"></i>
                                        <div class="card-logo"></div>
                                        <div class="card-list unselect"></div>
                                    </div>
                                    <span class="field-validation-valid input-wrong" data-valmsg-for="CardNumber.PanString" data-valmsg-replace="true"></span>
                                    <input id="SelectedCardId" name="SelectedCardId" type="hidden" class="ignore" />
                                    <input id="SelectedCardOwner" name="SelectedCardOwner" type="hidden" class="ignore" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-12">
                                    <label>شماره شناسایی دوم <small class="en">(CVV2)</small></label>
                                    <div class="input-holder has-action">
                                        <input autocomplete="off" class="password en-plh" data-back="CardNumber_PanString" data-focus="Month" data-label="CVV2" data-name="Cvv2" data-short="false" data-val="true" data-val-length="تعداد کارکترهای فیلد CVV2 باید بین 3 و 4 باشد" data-val-length-max="4" data-val-length-min="3" data-val-regex="فیلد CVV2 فقط مقادیر عددی می‌پذیرد" data-val-regex-pattern="^\d+$" data-val-required="CVV2 الزامی است" id="Cvv2" inputmode="numeric" maxlength="4" minlength="3" name="Cvv2" placeholder="CVV2" type="tel" value="" />
                                        <div class="action" data-relation="VirtualKeypad">
                                            <!--          <i class="icn-keyboard"></i>-->
                                        </div>
                                    </div>
                                    <span class="field-validation-valid input-wrong" data-valmsg-for="Cvv2" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-12">
                                    <label>تاریخ انقضا</label>
                                    <div class="input-group match">
                                        <input autocomplete="off" class="mono fa-plh" data-back="Cvv2" data-focus="Year" data-label="تاریخ انقضا" data-name="Month" data-val="true" data-val-range="فیلد ماه می بایست عددی بین 1 تا 12 باشد" data-val-range-max="12" data-val-range-min="1" data-val-required="ماه الزامی است" id="Month" inputmode="numeric" maxlength="2" minlength="2" name="Month" placeholder="ماه" type="tel" value="" />
                                        <input autocomplete="off" class="mono fa-plh" data-back="Month" data-current-year="02" data-focus="CaptchaInputText" data-label="تاریخ انقضا" data-name="Year" data-val="true" data-val-required="سال الزامی است" id="Year" inputmode="numeric" maxlength="2" minlength="2" name="Year" placeholder="سال" type="tel" value="" />
                                    </div>
                                    <span class="field-validation-valid input-wrong" data-valmsg-for="Month" data-valmsg-replace="true"></span>
                                    <span class="field-validation-valid input-wrong" data-valmsg-for="Year" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-12">
                                    <label>کد امنیتی</label>
                                    <div class="input-group">
                                        <div class="input-holder has-action action-left">
                                            <input id="CaptchaInputText" name="CaptchaInputText" type="tel" inputmode="numeric" minlength="5" maxlength="5" autocomplete="off" placeholder="کد امنیتی" data-name="CaptchaInputText" data-focus="Pin2" data-back="Year" data-label="کد امنیتی" data-val="true" data-val-required="کد امنیتی الزامی است" aria-describedby="CaptchaSecurityField-error" />
                                            <div class="action" data-relation="ReloadCaptcha">
                                                <!--            <i class="icn-update"></i>-->
                                            </div>
                                        </div>
                                        <div class="captcha-holder">
                                            <img src="../img/c.jpg" id="CaptchaImage" src="#" alt="captcha-img" class="captcha-img" />
                                        </div>
                                    </div>
                                    <span data-valmsg-for="CaptchaInputText" data-valmsg-replace="true" class="input-wrong field-validation-error"></span>
                                </div>
                            </div>
                            <div class="row mless-2x">
                                <div class="col col-12">
                                    <label>رمز دوم</label>
                                    <div class="input-group">
                                        <div class="input-holder has-action action-left">
                                            <input autocomplete="off" class="password en-plh" data-back="CaptchaInputText" data-focus="Purchase" data-label="رمز دوم" data-name="Pin2" data-val="true" data-val-length="تعداد کارکترهای فیلد رمز دوم باید بین 4 و 12 باشد" data-val-length-max="12" data-val-length-min="4" data-val-regex="فیلد رمز دوم فقط مقادیر عددی می‌پذیرد" data-val-regex-pattern="^\d+$" data-val-required="رمز دوم الزامی است" id="Pin2" inputmode="numeric" maxlength="12" minlength="5" name="Pin2" placeholder="رمز دوم" type="tel" value="" />
                                            <div class="action" data-relation="VirtualKeypad">
                                                <!--              <i class="icn-keyboard"></i>-->
                                            </div>
                                        </div>
                                        <button id="Otp" name="Otp" type="button" class="button fixed-width" data-action="Otp">درخواست رمز پویا</button>
                                    </div>
                                    <span class="field-validation-valid input-wrong" data-valmsg-for="Pin2" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="row mless-3x">
                                <div class="col col-12">


                                    <button id="Purchase" name="submit" type="submit" class="button success full-width" data-focus="Cancel" data-back="Pin2" data-action="Purchase">پرداخت <?=number_format(@$_SESSION['totalp'])?> تومان</button>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-12">
                                    <a href="unsuccess.php?cancel" id="Cancel" class="button outline danger full-width" data-action="Cancel" data-back="Purchase">انصراف</a>
                                </div>
                            </div>
                            <div class="row mless">
                                <div class="col col-12">
                                    <!--      <label for="push" class="checkbox circle checked" data-relation="SendReceipt"><input id="push" name="push" type="checkbox" /> مایلید اطلاعات پرداخت را به صورت ایمیل و پیامک دریافت کنید؟ <small>(اختیاری)</small></label>-->
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="knowledge">
            <div class="row">
                <div class="col col-12">
                    <div class="card">
                        <div class="head">
                            <h2>نکته امنیتی</h2>
                        </div>
                        <ul class="knowledge-list text-justify">
                            <li>دارنده محترم کارت بانکی، با مراجعه به بانک خود یا یکی از روشهای مورد نظر بانک شما، به منظور تایید شماره همراه و پویاسازی رمز دوم کارت خود اقدام نمایید.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col col-12">
                    <div class="card">
                        <div class="head">
                            <h2>راهنمای استفاده از رمز پویا</h2>
                        </div>
                        <ul class="knowledge-list text-justify">
                            <li>رمز پویا رمز یک‌بار مصرفی است که به جای رمز دوم کارت استفاده می‌شود.</li>
                            <li>مرحله اول: بر اساس دستورالعمل بانک صادرکننده کارت خود، نسبت به فعال سازی رمز پویا اقدام نمایید.</li>
                            <li>
                                مرحله دوم: رمز پویا را بر اساس روش اعلامی از طرف بانک صادر کننده کارت، به یکی از روش‌های زیر دریافت کنید.
                                <ul class="sublist">
                                    <li>1- دریافت از طریق برنامه کاربردی بانک، اینترنت بانک و یا موبایل بانک.</li>
                                    <li>2- دریافت از طریق کد USSD بانک صادر کننده کارت شما.</li>
                                    <li>3- دریافت از طریق زدن دکمه &quot;درخواست رمز پویا&quot; در درگاه پرداخت اینترنتی.</li>
                                </ul>
                            </li>
                            <li>مرحله سوم: پس از دریافت رمز به یکی از روش‌های فوق، رمز پویای دریافت شده را در محل تعیین شده برای &quot;رمز دوم&quot; وارد نمایید و سپس مابقی اطلاعات را تکمیل نمایید.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col col-12">
                    <div class="card">
                        <div class="head">
                            <h2>راهنما و نکات امنیتی</h2>
                        </div>
                        <ul class="knowledge-list text-justify">
                            <li><mark>شماره کارت:</mark> 16 رقمی بوده و بصورت 4 قسمت 4 رقمی روی کارت درج شده است.</li>
                            <li><mark>شماره شناسایی دوم <small class="en">(CVV2)</small>:</mark> شماره شناسایی کارت با طول 3 یا 4 رقم کنار شماره کارت و یا پشت کارت درج شده است.</li>
                            <li><mark>تاریخ انقضا:</mark> شامل دو بخش ماه و سال انقضا در کنار شماره کارت درج شده است.</li>
                            <li><mark>رمز دوم:</mark> با عنوان رمز دوم و در برخی موارد با <span class="en">PIN2</span> شناخته می‌شود، از طریق بانک صادر کننده کارت تولید شده و همچنین از طریق دستگاه‌های خودپرداز بانک صادر کننده قابل تهیه و یا تغییر می‌باشد.</li>
                            <li class="breakline"><mark>کد امنیتی:</mark> بخشی از محتوای صفحه پرداخت است و لازم است برای ادامه فرآیند خرید، کد موجود که به صورت عددی در تصویر مشخص شده است در محل پیش بینی شده درج شود.</li>
                            <li>درگاه پرداخت اینترنتی سامان با استفاده از پروتکل امن SSL به مشتریان خود ارائه خدمت نموده و با آدرس <span class="text-danger">https://sep.shaparak.ir</span> شروع می‌شود. خواهشمند است به منظور جلوگیری از سوء استفاده‌های احتمالی پیش از ورود هرگونه اطلاعات، آدرس موجود در بخش مرورگر وب خود را با آدرس فوق مقایسه نمایید و در صورت مشاهده هر نوع مغایرت احتمالی، موضوع را با ما در میان بگذارید.</li>
                            <li>از صحت نام فروشنده و مبلغ نمایش داده شده، اطمینان حاصل فرمایید.</li>
                            <li>برای جلوگیری از افشای رمز کارت خود، حتی المقدور از صفحه کلید مجازی استفاده فرمایید.</li>
                            <li>برای کسب اطلاعات بیشتر، گزارش فروشگاه‌های مشکوک و همچنین اطلاع از وضعیت پذیرندگان اینترنتی می‌توانید با شماره <a href="tel:+982184080" dir="ltr">021-84080</a> تماس بگیرید و یا از طریق آدرس ایمیل <a href="mailto:epay@sep.ir">epay@sep.ir</a> اقدام نمایید.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="dialog">
            <h1>انصراف از پرداخت</h1>
            <i class="icn-exit-badge exit-badge"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            <h2>آیا می‌خواهید فرآیند پرداخت لغو شود؟</h2>
            <div class="extra">
                <a href="" class="button danger full-width" data-action="CancelConfirmed">
                    <span>لغو پرداخت و خروج</span>
                </a>
                <a href="" class="button outline full-width" data-action="CancelNeverMind">
                    <span>ادامه فرآیند پرداخت</span>
                </a>
            </div>
            <i class="icn-xcross xcross"></i>
            <form action="https://sep.shaparak.ir/OnlinePG/OnlinePG" id="frmCancel" method="post">            <input id="Action" name="Action" type="hidden" value="cancel" />
                <input id="SessionKey" name="SessionKey" type="hidden" value="aCHQlQYS3Ag" />
            </form></div>
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="supervisors">
            <!--            <i class="icn-sep-logo-mono"></i>-->
        </div>
        <div class="trademark">
            <p>شرکت پرداخت الکترونیک سامان (سهامی عام) <span class="since">2008 - 2024</span></p>
        </div>
        <div class="extra">
            <p>تمامی حقوق این نرم‌افزار متعلق به سِپ (پرداخت الکترونیک سامان) می‌باشد.</p>
            <p>مرکز شبانه روزی ارتباط با مشتریان: <a href="tel:+982184080" class="tel" dir="ltr">021-84080</a></p>
        </div>
    </div>
</div>
<script>
    let totalSeconds = 10 * 60; // 10 minutes in seconds

    function updateTimer() {
        const minutes = Math.floor(totalSeconds / 60);
        const seconds = totalSeconds % 60;
        const formattedMinutes = minutes.toString().padStart(2, '0');
        const formattedSeconds = seconds.toString().padStart(2, '0');

        document.getElementById('timer').textContent = `${formattedMinutes}:${formattedSeconds}`;

        if (totalSeconds > 0) {
            totalSeconds--;
        } else {
            clearInterval(timerInterval);
            alert('زمان به پایان رسید!');
            window.location.href='../index.php';
        }
    }

    updateTimer(); // Initialize the timer display
    const timerInterval = setInterval(updateTimer, 1000); // Update every second
</script>
</body>

</html>
