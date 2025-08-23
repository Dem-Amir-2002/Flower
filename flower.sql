-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2025 at 02:28 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flower`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`title`, `content`) VALUES
('درباره ما', 'به دنیای سبز ما خوش آمدید!\r\nما در [گرین کاشت] با عشق به طبیعت و زیبایی، بستری را فراهم کرده‌ایم تا خرید گل و گیاه به تجربه‌ای دلنشین و آسان تبدیل شود. هدف ما تنها فروش گل و گیاه نیست، بلکه ایجاد ارتباطی عمیق‌تر میان شما و طبیعت است.\r\nدر فروشگاه ما مجموعه‌ای از گل‌های آپارتمانی، گیاهان زینتی، گلدان‌های خاص، ابزار باغبانی و محصولات مراقبتی گل و گیاه را با بهترین کیفیت و قیمت مناسب ارائه می‌دهیم.\r\n\r\nتیم ما از افراد علاقه‌مند و متخصص در حوزه گل و گیاه تشکیل شده که همواره آماده پاسخ‌گویی و مشاوره برای انتخاب مناسب‌ترین گیاه برای فضای شما هستند.\r\nما باور داریم هر خانه‌ای با یک گیاه، جانی تازه می‌گیرد و حس آرامش را با خود به ارمغان می‌آورد.\r\n\r\nبا ارسال سریع، بسته‌بندی ایمن و پشتیبانی دلسوزانه، کنار شما هستیم تا لحظات سبز و پرنشاطی را تجربه کنید.\r\nدر مسیر زیباسازی خانه‌ها و محل کار، همراهتان خواهیم بود. با ما سبز بمانید!');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short` text NOT NULL,
  `content` longtext NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `catid`, `title`, `short`, `content`, `pic`, `created_at`) VALUES
(1, 1, 'دانش پایه برای خرید کود مناسب', 'در 2 دقیقه پیش رو یاد می گیریم که چطور کود مناسب گیاهان مورد نظرمان را از میان برند ها و کود های متفاوت تشخیص داده و خرید کنیم', '<p>\r\n	<span style="background-color:rgb(255,255,255);color:rgb(38,38,38);"><strong>نیتروژن فسفر پتاسیم NPK:</strong></span><br />\r\n	<br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(38,38,38);"><strong>نیتروژن</strong> باعث سرسبزی ساقه، برگ و شاخه می شود.&nbsp;کاهش این عنصر در گیاه باعث میشود که رنگ برگ&nbsp;به مرور زمان روشن/زرد&nbsp;و سپس خشک شود.&nbsp;این اتفاق بر روی تمام برگ قابل مشاهده است و فقط از لبه یا وسط برگ شروع نمی شود.</span><br />\r\n	<br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(38,38,38);"><strong>فسفر</strong> برای افزایش رشد ریشه،گیاه&nbsp;و افزایش شکوفه و گلدهی در گیاهان گلدار مانند شمعدانی یا ارکیده استفاده می شود.کاهش این عنصر در گیاه باعث می شود،لبه برگ ها به رنگِ قرمز بنفش،تغییر کند.</span><br />\r\n	<br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(38,38,38);"><strong>پتاسیم</strong> به تقویت سیستم ایمنی گیاه و افزایش مقاومت آن در برابر تغییرات دمایی و بیماری کمک می کند.&nbsp;کاهش این عنصر در گیاه باعث می شود&nbsp;لبه برگ ها و سپس کل برگ شروع به زرد شدن می کند و در نهایت برگ،خشک شده و از گیاه جدا می شود.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="background-color:rgb(255,255,255);color:rgb(38,38,38);"><strong>کلسیم Ca</strong></span><br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(38,38,38);">کلسیم جزو عناصر فرعی است. نشانه کمبود این عنصر فقط بر روی جوانه یا برگ جدید قابل مشاهده است.&nbsp;</span><br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(38,38,38);">کاهش این عنصر در گیاه باعث می شود&nbsp;لبه برگ های جدید شروع به پوسیدن،جمع شدن و خشک شدن کنند.</span><br />\r\n	<br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(38,38,38);"><strong>منگنز Mn</strong></span><br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(38,38,38);">منگنز جزو عناصر فرعی است. این عنصر کمک به جذب فسفر می کند&nbsp;به همین دلیل کمبود آن&nbsp;می تواند باعث قرمز یا بنفش شدن لبه برگ ها شده یا باعث پررنگ شدن رگبرگ ها و زرد شدن،سپس خشک شدن اطراف و در نهایت کل آن شود.</span><br />\r\n	<br />\r\n	پس از این به بعد،به مقدار 3 عنصر نیتروژن N،فسفر P و پتاسیم K که بر روی لیبل کود درج شده توجه کنید.</p>\r\n<p>\r\n	<br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(38,38,38);">اگر کود را برای گیاهانی پر برگ مانند بابا ادم،فیلودندرون و &hellip; تهیه می کنید پس نیتروژن بیشتری نیاز دارید.</span><br />\r\n	<br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(38,38,38);">اگر کود را برای گلدهی گیاهانی مانند ارکیده،بنفشه آفریقایی و &hellip; تهیه می کنید پس عنصر وسطی یعنی فسفر باید بیشتر باشد.</span><br />\r\n	<br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(38,38,38);">عنصر آخری یعنی پتاسیم K برای تمامی گیاهان آپارتمانی نیازه ولی مراقب باشید عدد آن با دو عنصر دیگر خیلی نامتعادل نباشد</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n', '1748886957_thumb-763574c98983dea83cafd3e007a34a784e53b7011672603601.jpg', 1748886957),
(2, 1, 'فواید گیاهان آپارتمانی', 'گیاهان آپارتمانی نه تنها ظاهر کلی یک فضا را بهبود می بخشند،بلکه مطالعات نشان می دهد که باعث تقویت خلق و خوی،افزایش خلاقیت،کاهش استرس و از بین بردن آلاینده های هوا و باعث شادابی شما می شوند.', '<p>\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);"><strong>گیاهان آپارتمانی&nbsp;فقط ظاهر خوبی ندارند، بلکه می توانند حس خوبی را نیز منتقل کنند.&nbsp;</strong></span><br />\r\n	<br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">مطالعات نشان داده است که گیاهان آپارتمانی می توانند:</span><br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">1.&nbsp;روحیه، بهره&zwnj;وری،&nbsp;تمرکز و خلاقیت را تقویت کنند.</span><br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">2.&nbsp;استرس و خستگی را کاهش دهند.</span><br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">3.&nbsp;هوای داخل خانه را با جذب سموم، افزایش رطوبت و تولید اکسیژن تمیز کنند.</span><br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">4.&nbsp;به فضاهای خشک، سرد و بی فایده زندگی ببخشند.</span><br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">5.&nbsp;حریم خصوصی ایجاد کنند و سطح سر و صدا را کاهش دهند.</span><br />\r\n	<br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);"><strong>&quot;گیاهان حال ما را بهتر میکنند&quot;</strong></span><br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">وقتی شما ناراحت می شوید، شگفت انگیز است که پیاده روی در پارک چه می تواند با شما بکند.</span><br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">به این دلیل است که وقتی با طبیعت ارتباط برقرار می کنیم حس و حال خود را بهبود می بخشیم.</span></p>\r\n<figure class="image image-style-side">\r\n	<p style="text-align: center;">\r\n		<img src="https://www.ninsarbloom.com/uploads/images/ckeditor/51669bba1b64733f4323557160dde9c7e663d651_House_Calls_Herman_Pelosi_Brooklyn_living_room_Gabriella_Herman.jpg" style="height: 450px; width: 800px;" /></p>\r\n</figure>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">مطالعات نشان می دهد که زمان صرف شده در فضای سبز می تواند خستگی ذهنی ما را &nbsp;کاهش، آرامش خاطر را افزایش و حتی قدرت شناخت و یادگیری ما را بهبود بخشد.</span><br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">با این حال،&nbsp;طبق گزارشات آژانس&nbsp;حفاظت از محیط زیست ایالات متحده آمریکا،&nbsp;ما مقدار قابل توجهی از زمان خود را در داخل خانه می گذرانیم،&nbsp;حدود 90 درصد.&nbsp;اینجاست که گیاهان آپارتمانی می توانند ما را نجات دهند.</span><br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">اگرچه آنها جایگزینی برای فضای سبز به حساب نمی آیند اما می توانند&nbsp;مزایای مشابهی را ارائه دهند.</span><br />\r\n	<br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">مطالعات نشان داده&zwnj;اند که حتی قرار گرفتن کوتاه مدت در معرض&nbsp;طبیعت&nbsp;مانند لمس برگ گیاهی طبیعی،&nbsp;می تواند یک اثر آرامبخش ناخودآگاه ایجاد کند.</span><br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">نه تنها وجود گیاهان سرپوشیده می تواند تسکین و احیا کند بلکه مطالعات میدانی علمی نشان داده است که وقتی از گیاهان&nbsp;در فضای کاری استفاده شده است،&nbsp;عملکرد کاری افزایش یافته و کارمندان حال بهتری دارند&nbsp;و مرخصی های استعلاجی کاهش می یابد.</span><br />\r\n	<br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">فضاهای شهری و زندگی شهرنشینی در حال گسترش هستند و در اکثر مواقع در زندگی روزمره اکثریت تعاملات ما با فناوری در فضاهای سرد و به دور از طبیعت طی می شود.&nbsp;</span><br />\r\n	<br />\r\n	<span style="background-color:rgb(255,255,255);color:rgb(0,0,0);">پس امروزه باید اولویت&zwnj; های خودمان را دوباره بازنگری کرده،ارتباطات مان را با طبیعت تقویت کرده تا بتوانیم از داشتن یک زندگی سالم و شاداب لذت ببریم.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n', '1748887085_thumb-41a57d0a7c63b3b30a2d83bca96887facd9ce5821671025477.jpg', 1748887085),
(3, 1, 'درمان شپشک آردآلود', 'شپشک ­های آرد آلود حشرات ریزی هستند که به دلیل داشتن پوششی سفید و آرد مانند بر روی بدنشان به راحتی بر روی سطح گیاه قابل شناسایی هستند. برای از بین بردن این آفات خطرناک و نجات گیاه خود این مقاله را بادقت مطالعه کنید.', '<p>\r\n	<span style="color:hsl(0, 0%, 0%);">اگر متوجه شدید که بنظر می رسد گیاه شما با برف پوشیده شده است و یا برگ های آن دارای لکه های سفید است. باید بدانید که گیاه شما تحت حمله شپشک آردآلو قرار گرفته است.</span><br />\r\n	<span style="color:hsl(0, 0%, 0%);">برای اطمینان از تشخیص زودرس تمام گیاهان خود را به طور مرتب بازرسی کنید.حتماً گیاهانی را که در کنار گیاه بیمار هستند چه کنید.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<figure class="image image-style-side">\r\n	<img src="https://www.ninsarbloom.com/uploads/images/ckeditor/ff150e0963c8756fc9973daf0b3acf0fa758b58b_photo_2017-09-04_08-08-55.jpg" /></figure>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:hsl(0, 0%, 0%);">برای درمان شپشک آرد آلود به موارد زیر نیاز دارید:</span><br />\r\n	<span style="color:hsl(0, 0%, 0%);">1. دستکش</span><br />\r\n	<span style="color:hsl(0, 0%, 0%);">2. الکل 70 درصد</span><br />\r\n	<span style="color:hsl(0, 0%, 0%);">3. صابون / مایع ظرفشویی</span><br />\r\n	<span style="color:hsl(0, 0%, 0%);">4. پنبه / دستمال مرطوب</span><br />\r\n	<span style="color:hsl(0, 0%, 0%);">5. آبپاش</span><br />\r\n	<span style="color:hsl(0, 0%, 0%);">6. بطری آب / کاسه آب</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h3>\r\n	<span style="color:hsl(0, 0%, 0%);"><strong>درمان شیمیایی:</strong></span></h3>\r\n<h4>\r\n	&nbsp;</h4>\r\n<h4>\r\n	<span style="color:hsl(0, 0%, 0%);"><strong>مرحله اول:</strong></span></h4>\r\n<p>\r\n	<span style="color:hsl(0, 0%, 0%);">یک تکه پنبه و گوش پاک کن را در الکل بزنید و تمامی شپشک های آردآلودی که مشاهده می کنید را از روی گیاه و برگ بردارید. (گیاه را تمیز کنید.)</span><br />\r\n	<span style="color:hsl(0, 0%, 0%);">از پنبه برای تمیز کردن برگ ها و از گوش پاک کن برای تمیز کردن شکاف بین برگ ها، ساقه ها و تمام قسمت های مخفی گیاه استفاده کنید.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h4>\r\n	<span style="color:hsl(0, 0%, 0%);"><strong>مرحله دوم:</strong></span></h4>\r\n<p>\r\n	<span style="color:hsl(0, 0%, 0%);">یک فنجان ( نصف لیوان) الکل را با چند قطره صابون در یک چهارم لیوان آب، قاطی کنید. پس از آماده شدن محلول، آن را در بطری اسپری بریزید. تمام گیاه از جمله بالا، پایین، لایه ساقه و حدود 5 سانتی متر از سطح خاک را اسپری کنید.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h4>\r\n	<span style="color:hsl(0, 0%, 0%);"><strong>مرحله سوم:</strong></span></h4>\r\n<p>\r\n	<span style="color:hsl(0, 0%, 0%);">این کار را هر 7 الی 10 روز انجام دهید تا زمانی که گیاه شما دوباره سرحال و درمان شود.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:hsl(0, 0%, 0%);">نکته: گیاه بیمار را تا وقتی درمان نشده در کنار گیاهان دیگر قرار ندهید.</span><br />\r\n	<span style="color:hsl(0, 0%, 0%);">نکته: برای جلوگیری از هرگونه آسیب به مبلمان و یا &nbsp;کف خانه، حتما سطحی را که در آن گیاه را درمان می کنید بپوشانید.</span><br />\r\n	<span style="color:hsl(0, 0%, 0%);">نکته: فراموش نکنید که بعد از کار، ابزار و دست خود را بشویید تا وقتی که به گیاه دیگری دست میزنید بیماری منتقل نشود.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h3>\r\n	<span style="color:hsl(0, 0%, 0%);"><strong>درمان طبیعی:&nbsp;</strong></span></h3>\r\n<p>\r\n	<span style="color:hsl(0, 0%, 0%);">نکته: راه حل طبیعی در مواقعی استفاده می شود بیماری شروع پیدا نکرده و تازه در حال ایجاد و همه گیر شدن است.</span><br />\r\n	<span style="color:hsl(0, 0%, 0%);">نکته: البته وقتی بیماری شدید است هم میشود از این روش استفاده کرد، ولی احتمال اینکه شکست بخوریم و یا درمان مدت زمان بیشتری طول بکشد، وجود دارد.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h4>\r\n	<span style="color:hsl(0, 0%, 0%);"><strong>مرحله اول:</strong></span></h4>\r\n<p>\r\n	<span style="color:hsl(0, 0%, 0%);">اگر بیماری همگی نشده باشد به راحتی با یک دستمال مرطوب با شستن برگ ها، زیر آب به آرامی از بین می رود. ولی اگر شیوع پیدا کرده است باید گیاه را زیر دوش آب ببرید و با فشار آب، کل گیاه را آبیاری کنید و برگ ها را تمیز کنید.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:hsl(0, 0%, 0%);">نکته: دمای آب متعادل باشد.</span><br />\r\n	<span style="color:hsl(0, 0%, 0%);">نکته: برای افرادی که نمی خواهند از مواد شیمیایی به دلیل این که حیوان خانگی دارند استفاده کنند، پیشنهاد می شود.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h4>\r\n	<span style="color:hsl(0, 0%, 0%);"><strong>مرحله دوم:</strong></span></h4>\r\n<p>\r\n	<span style="color:hsl(0, 0%, 0%);">باید از روغن چریش یا باغبانی استفاده کنید. چرکه شپشک های کوچک و تخم های را از بین می برد.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:hsl(0, 0%, 0%);">نکته: روغن را برروی تمام نقاط گیاه از برگ تا لایه ساقه ها اسپری کنید. سپس بگذارید حدود 10 الی 25 دقیقه روی گیاه بماند. این کار را هر 7 الی 10 روز انجام دهید.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h4>\r\n	<span style="color:hsl(0, 0%, 0%);"><strong>مرحله سوم:</strong></span></h4>\r\n<p>\r\n	<span style="color:hsl(0, 0%, 0%);">می توانید کفشدوزک هایی را تهیه کرده و بر روی گیاه رها کنید تا شپشک ها را بخورد.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:hsl(0, 0%, 0%);">نکته: نگران نباشید، کفشدوزک ها برای گیاه ضرری ندارند و آسیبی به آن نمی رساند.</span><br />\r\n	<span style="color:hsl(0, 0%, 0%);">نکته: گیاه را پس از اتمام کار، در مکانی با نور و دمای مناسب قرار دهید تا خاک گیاه قبل از شب خشک شود.&nbsp;</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n', '1748887147_thumb-aff85abf8eb208e2e5b028dd200a261252f9578c1655456010.jpg', 1748887147),
(4, 1, '6 دلیل زرد شدن برگ های گیاهان آپارتمانی', 'زرد شدن برگ‌های گیاهان آپارتمانی می‌تواند ناشی از شرایط مختلفی باشد. گاهی اوقات علت واضح است، به این معنی که می توانید بلافاصله آن را تشخیص داده و برطرف کنید. مواقع دیگری وجود دارد که مشکل بیشتر یک رمز و راز است. ', '<h4>\r\n	<span style="color:hsl(0,0%,0%);"><strong>. مشکلات آبیاری</strong></span></h4>\r\n<p>\r\n	&nbsp;</p>\r\n<figure class="image image-style-side">\r\n	<img src="https://www.ninsarbloom.com/uploads/images/ckeditor/b971161da600002937fc8a9dfeda1d3a4685835d_استرس رطوبتی.webp" /></figure>\r\n<p>\r\n	<span style="color:hsl(0,0%,0%);">آبیاری بیش از حد یا کم آبی رایج&zwnj;ترین دلیلی است که برگ&zwnj;های گیاه زرد می&zwnj;شوند. در گیاهان گلدانی، بسیار مهم است که فقط به اندازه نیاز گیاه آبیاری کنید. اگر گیاهی با برگ های زرد دارید، خاک گلدان را بررسی کنید. خشک است؟ آیا خیس شده است؟</span></p>\r\n<p>\r\n	<span style="color:hsl(0,0%,0%);">اگر گیاهان آب کافی دریافت نکنند، برای جلوگیری از تعریق، برای حفظ آب، برگها را رها می کنند. با این حال، قبل از افتادن، برگ ها معمولاً زرد می شوند. اگر خاک خشک است و این اتفاق می افتد، بهتر است گیاه را در برنامه آبیاری منظم قرار دهید.</span></p>\r\n<p>\r\n	<span style="color:hsl(0,0%,0%);">آب زیاد می تواند به همان اندازه برای برگ ها مضر باشد. هنگامی که خاک به خوبی زهکشی نمی کند، مصرف بیش از حد آب خاک را غرقاب می کند و سیستم ریشه می تواند به معنای واقعی کلمه غرق شود. بدون اکسیژن، ریشه ها شروع به مردن می کنند.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h4>\r\n	<br />\r\n	<span style="color:hsl(0,0%,0%);"><strong>2. پیری طبیعی</strong></span></h4>\r\n<p>\r\n	&nbsp;</p>\r\n<figure class="image image-style-side">\r\n	<img src="https://www.ninsarbloom.com/uploads/images/ckeditor/b4d1daf78cdefafd7ae4319d086c299a748a45f2_عادی.webp" /></figure>\r\n<p>\r\n	<span style="color:hsl(0,0%,0%);">با افزایش سن بسیاری از گیاهان، برگ های پایینی زرد شده و می ریزند. این به سادگی یک بخش طبیعی از رشد آنها است. در این مورد، نگران نباشید. اگر گیاه بیش از حد ساقدار شد، ساقه اصلی را کوتاه کنید تا رشد گیاه شروع شود.</span></p>\r\n<h4>\r\n	<br />\r\n	<span style="color:hsl(0,0%,0%);"><strong>3. سرما</strong></span></h4>\r\n<p>\r\n	&nbsp;</p>\r\n<figure class="image image-style-side">\r\n	<img src="https://www.ninsarbloom.com/uploads/images/ckeditor/4f470b0add89c80e22120ad38d9bab9d1f8fc16c_3.webp" /></figure>\r\n<p>\r\n	<span style="color:hsl(0,0%,0%);">بادهای سرد روی گیاهان گرمسیری اغلب باعث زرد شدن و ریزش برگ ها می شود. این با دوره های کوتاه قرار گرفتن در معرض سرمای شدید متفاوت است که باعث قهوه ای شدن کامل روی شاخ و برگ یا ظاهر شدن لکه های شفاف و کم رنگ بین رگبرگ ها می شود.</span></p>\r\n<p>\r\n	<span style="color:hsl(0,0%,0%);">اگر گیاه شما در تابستان نزدیک دریچه تهویه مطبوع یا در زمستان در نزدیکی پنجره هوا قرار دارد، آن را به مکانی کمتر متلاطم منتقل کنید. مراقب آن باشید تا ببینید آیا برگ های زرد بیشتر پخش می شوند یا خیر. همچنین ایده خوبی است که برای افزایش رطوبت، مه پاشی کنید. این کارها را برای از بین بردن این دلایل رایج برای زرد شدن برگ ها انجام دهید، سپس منتظر بمانید تا ببینید چه اتفاقی می افتد.</span></p>\r\n<h4>\r\n	&nbsp;</h4>\r\n<h4>\r\n	&nbsp;</h4>\r\n<h4>\r\n	<span style="color:hsl(0,0%,0%);"><strong>4. کمبود نور</strong></span></h4>\r\n<p>\r\n	&nbsp;</p>\r\n<figure class="image image-style-side">\r\n	<img src="https://www.ninsarbloom.com/uploads/images/ckeditor/1c88c4ae46d29b30bf7ab9753932da23a57c459e_4.webp" /></figure>\r\n<p>\r\n	<span style="color:hsl(0,0%,0%);">گیاهانی که نور بسیار کمی دریافت می کنند، اغلب قبل از اینکه برگها بریزند، روی برگهای پایین شروع به زرد شدن می کنند. اگر این مشکل شماست، سرنخی وجود دارد که می توانید به دنبال آن باشید. گیاهی که به دلیل کمبود نور زرد می شود، معمولاً در سمتی که از منبع نور دور است زرد می شود. به عنوان مثال، برگ های نزدیک پنجره، تمام نور را دریافت می کنند و طرف مقابل را مسدود می کنند. یک راه عالی برای رفع این مشکل این است که گلدان را هفته ای یک بار کمی بچرخانید تا همه طرف ها به نور طبیعی دسترسی داشته باشند.</span></p>\r\n<p>\r\n	<span style="color:hsl(0,0%,0%);">اگر اینطور است، گیاه را به مکان آفتابی تر منتقل کنید و ببینید که چگونه عمل می کند. اگر نور پنجره در خانه شما کم است - به خصوص در زمستان - ممکن است لازم باشد یک یا دو چراغ مصنوعی گیاهی نصب کنید.</span></p>\r\n<h4>\r\n	<br />\r\n	<span style="color:hsl(0,0%,0%);"><strong>5. کمبود مواد مغذی</strong></span></h4>\r\n<p>\r\n	&nbsp;</p>\r\n<figure class="image image-style-side">\r\n	<img src="https://www.ninsarbloom.com/uploads/images/ckeditor/ac662c0ec66a64b47a1a87e57ba91aff2eead877_5.webp" /></figure>\r\n<p>\r\n	<span style="color:hsl(0,0%,0%);">اگر گیاه تمام مواد مغذی مورد نیاز خود را دریافت نکند، ممکن است برگ&zwnj;های گیاه نیز زرد شوند. اگر از آب سخت استفاده می کنید، کمبود نیتروژن یا وجود کلسیم بیش از حد در آ بمی تواند دلیل آن &nbsp;باشد. اگر مشکل این باشد، ممکن است اولین برگ های گیاه زرد شوند. در موارد دیگر، ممکن است متوجه یک الگوی غیرمعمول برای زرد شدن شوید. به عنوان مثال، سیاهرگ ها ممکن است تیره باقی بمانند در حالی که بافت بین آنها زرد می شود.</span></p>\r\n<p>\r\n	<span style="color:hsl(0,0%,0%);">مواد مغذی مورد نیاز یک گیاه بر اساس گونه متفاوت است و برخی از آن&zwnj;ها نسبت به سایرین انتخاب&zwnj;کننده&zwnj;تر هستند. مهم است که سعی کنید مشکل را به درستی تشخیص دهید، در غیر این صورت ممکن است گیاهی را بکشید که در غیر این صورت می&zwnj;توانید سلامت خود را بازگردانید. خرید یک کیت خاک کوچک برای آزمایش خاک در خانه می تواند سرمایه گذاری خوبی باشد. اینکه بتوانید دقیقاً نیازهای گیاه خود را مشخص کنید بسیار کمک خواهد کرد. این به شادابی و سلامت گیاهان شما کمک می کند.</span></p>\r\n<h4>\r\n	<br />\r\n	<span style="color:hsl(0,0%,0%);"><strong>6. عفونت ویروسی</strong></span></h4>\r\n<p>\r\n	&nbsp;</p>\r\n<figure class="image image-style-side">\r\n	<img src="https://www.ninsarbloom.com/uploads/images/ckeditor/3bc1029e5154578cc9314d28f98398c37fdf5daa_6.webp" /></figure>\r\n<p>\r\n	<span style="color:hsl(0,0%,0%);">اگر گیاه شما عفونت ویروسی داشته باشد، ممکن است به صورت لکه دار ظاهر شود و لکه های زرد روی برگ ها در سراسر گیاه پخش شود. این ممکن است با تغییر شکل برگ ها و ساقه ها و همچنین تغییر رنگ گل ها همراه باشد.</span></p>\r\n<p>\r\n	<span style="color:hsl(0,0%,0%);">عفونت های ویروسی در گیاهان ممکن است قابل درمان نباشند و می توانند همه گیاهان حساس نزدیک را آلوده کنند. به محض اینکه متوجه گیاه بیمار شدید آن را از بقیه گیاهان خود قرنطینه کنید. گیاهان همسایه را بررسی کنید تا اطمینان حاصل کنید که گسترش آن مهار شده است. شما می توانید اقدامات لازم را برای نجات گیاه انجام دهید، اما ابتدا باید سعی کنید ویروس را شناسایی کنید.</span></p>\r\n<p>\r\n	<span style="color:hsl(0,0%,0%);">&nbsp;برخی از درمان ها می توانند شامل قارچ کش ها باشند، در حالی که برخی دیگر ممکن است نیاز به حذف قسمت های سالم و تکثیر داشته باشند. ممکن است مجبور شوید گیاهانی را که نمی توانید به سلامتی خود بازگردانید دور بیندازید. قبل از استفاده وسایل باغبانی خود روی گیاهان دیگر، ابزارهای هرس یا گلدان را بشویید و استریل کنید.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n', '1748887220_thumb-7452cd09b3aa2180e1f93b12944922b33140baf51651673433.jpg', 1748887220);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(10) UNSIGNED NOT NULL,
  `parentid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `parentid`, `cname`, `pic`) VALUES
(1, 0, 'سم', '1748887946_icon-img4.svg'),
(2, 0, 'کاکتوس', '1748887955_icon-img5.svg'),
(3, 0, 'خاک', '1748887986_icon-img6.svg'),
(4, 0, 'کود', '1748888000_icon-img7.svg'),
(5, 0, 'گیاه آپارتمانی', '1748888007_icon-img8.svg'),
(6, 0, 'گلدان', '1748888031_icon-img9.svg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `proid` int(11) NOT NULL,
  `comment` text COLLATE utf8_persian_ci,
  `comment_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `userid`, `proid`, `comment`, `comment_date`) VALUES
(1, 1, 1, 'بسیار برند عالی و خوبی هست', 1747656373),
(2, 1, 2, 'تست پیام', 1747662517);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8_persian_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `content` text COLLATE utf8_persian_ci,
  `created_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `content`, `created_at`) VALUES
(1, 'علی دایی', 'ali@gmail.com', NULL, NULL, 'سایت خوبی دارید', 1747668639);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(10) UNSIGNED NOT NULL,
  `tel` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `telegram` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `tel`, `mobile`, `email`, `address`, `whatsapp`, `instagram`, `telegram`) VALUES
(1, '09905541381', '09905541381', 'amirdamirchi2002@gmail.com', 'ایران', 'whatsapp', 'instagram', 'telegram');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order_date` int(11) NOT NULL,
  `update_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `productid`, `price`, `count`, `status`, `order_date`, `update_date`) VALUES
(1, 1, 7, 231000, 3, 1, 1737971738, 1737971771),
(3, 1, 5, 3000000, 1, 1, 1738069964, 1748952922),
(4, 1, 8, 299000, 1, 1, 1738077448, 1749206075),
(5, 1, 7, 761000, 2, 1, 1748952129, 1749206170),
(6, 1, 11, 350000, 2, 0, 1748952129, NULL),
(7, 1, 10, 583000, 2, 0, 1748981439, NULL),
(8, 1, 6, 881000, 1, 0, 1750953529, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `keyfeatures` text NOT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `catid`, `title`, `count`, `size`, `weight`, `keyfeatures`, `price`, `discount`, `color`, `images`, `description`, `status`, `created_at`) VALUES
(5, 5, 'آنتوریوم قرمز با گلدان فلزی مخروطی', 3, NULL, NULL, 'یکی از هدایای زیبا و خاص که در مجموعه گل‌سِتان برای شما آماده کرده ایم آنتوریوم در گلدان فلزی است. ترکیب رنگ گل‌ها و گلدان فلزی به گونه‌ای است که هر بیننده‌ای را جذب می کند.', 1690000, 1500000, 'قرمز', 'anthurium-red-planet.jpg,1748896014red-anthurium-planet-pot-size.jpg', 'آنتوریوم در گلدان فلزی قرمز یکی از جذاب‌ترین و زیباترین گیاهان آپارتمانی است که می‌توانید به راحتی آن را از گل‌‍‌سِتان سفارش دهید. اگرچه آنتوریوم گل‌های بسیار جذاب، درشت و خیره کننده‌ای دارد که همه نگاه‌ها را به خود جلب می‌کند اما گیاه بدون گل آن نیز زیبایی بی نظیری دارد. این گیاه نماد مهربانی، شادی و مهمان نوازی است.\r\n\r\nبرگ‌های این گل، به رنگ سبز تیره، چرمی و قلبی شکل هستند و به تنهایی نیز دلربایی منحصر به فردی دارند. زیبایی این گیاه به حدی است که یکی از گزینه‌های اصلی دکوراسیون‌های داخلی در تزیین انواع فضاهای مسکونی و تجاری و اداری محسوب می‌شود.\r\nالبته شاید شرایط نگهداری از آن کمی دشوار به نظر برسد اما به راستی بهرمندی از زیبایی و جلوه این گیاه ارزش کمی زحمت و دردسر را دارد. این گیاه، همچنین گزینه بسیار مناسبی برای هدیه دادن به دوستان و عزیزان در مناسبت‌های مختلف است.\r\nمشخصات محصولی که دریافت خواهید کرد\r\n\r\nمحصولی که از گل‌سِتان دریافت خواهید کرد شامل موارد زیر است:\r\n\r\n    یک گیاه آنتوریوم که در یک گلدان فلزی رنگ کوره ای کاشته شده است.\r\n    بلندی این گیاه بین 55 تا 70 و پهنای آن 25 سانتی‌متر است.\r\n    کارت پستال رایگان با متن دلخواه شما\r\n\r\nهمه گل‌ها و گیاهان برای رشد و پرورش بهتر و ایجاد شرایط مناسب برای نگهداری آنها باید نکات و اصول نگهداری آن را به خوبی بدانید. اگر تصمیم دارید این محصول را خریداری کنید، برای نگهداری بهتر از آن مقاله ما درباره نگهداری گیاه آنتوریوم را مطالعه فرمایید. در صورت وجود هر گونه سوال می‌توانید با کارشناسان ما در گل‌سِتان تماس بگیرید.', 1, 1748896014),
(6, 5, 'شفلرا ابلق', 0, NULL, NULL, 'طول : 30 سانتی‌متر\r\nعرض : 30 سانتی‌متر\r\nبازه ارتفاع : از 80 سانتی‌متر تا 100 سانتی‌متر\r\nگلدان همراه : ارتفاع 35 سانتی‌متر با قطر دهنه 20 سانتی‌متر', 881000, 0, 'ابلق', 'sheflera-ablagh-model02-768x768.jpg,1748896552sheflera-ablagh-model02-dimension-768x768.jpg', '', 1, 1748896552),
(7, 5, 'زاموفیلیا همراه با گلدان', 0, NULL, NULL, 'گیاه زاموفیلیا یکی از گیاهان آپارتمانی مقاوم است که با روش نگهداری ساده‌ای که دارد محبوبیت زیادی پیدا کرده و در سازمان‌ها و خانه‌ها قابل نگهداری است. زاموفیلیا در گلدان سفید محصولی است که اکنون به معرفی آن می‌پردازیم. گفتنی است برای خرید زاموفیلیا در انواع و ابعاد مختلف سایر محصولات ما را نیز مشاهده فرمایید.', 761000, 700000, '', '1748896956zamioculcas.jpg,1748896956zamioculcas-plant.jpg,1748896956zamioculcas-pot-size.jpg', 'زاموفیلیا یکی از مقاوم‌ترین گیاه‌های آپارتمانی می‌باشد که با کمترین نور ممکن زندگی می‌کند. این گیاه به آب زیادی نیاز ندارد و گیاه مناسب برای خانه های کم نور می‌باشد. اگر به دنبال یک گیاه مقاوم، کم نور و ماندگار هستید و متخصص در خشک کردن گیاهان هستید! قطعا خرید گلدان زاموفیلیا می‌تواند بهترین انتخاب شما باشد چرا که خشک کردن آن کار بسیار دشواری است!\r\n\r\nگلدان زاموفیلیا یک گیاه سبز آپارتمانی با برگ‌های زیباست که مورد علاقه آرشیتکت‌ها برای استفاده در طراحی دکوراسیون داخلی می‌باشد. قیمت زاموفیلیا به کیفیت گیاه و ارتفاع شاخه‌های آن که نشان دهنده سن آن گیاه است بستگی دارد. زاموفیلیا یکی از بهترین انتخاب‌ها از بین گیاهان آپارتمانی است.\r\nبرگ‌های سبزرنگ، استوار و مقاومت بالای آن‌ها در برابر میزان مختلف نور و از همه مهمتر نیاز کم آن به رسیدگی، آن را به یکی از ایده‌آل ترین گیاهان برای نگهداری در منزل و محیط کار تبدیل کرده است.\r\nروش نگهداری از زاموفیلیا\r\n\r\nگیاه زاموفیلیا به نور غیر مستقیم نیاز داره اما در نور کم هم این گیاه به راحتی زندگی خواهد کرد. این گیاه حدود 10 روز یکبار به آب دهی نیاز دارد و در فصل زمستان حتی با فاصله‌های زمانی بیشتر.\r\nکمک به سلامت :\r\n\r\nمانند بیشتر گیاهان، گیاه زاموفیلیا هم به بهبود کیفیت هوا کمک می‌کند. اما علاوه بر این، باعث تصفیه کردن هوا هم شده و با جذب آلودگی‌های رایج موجود در منازل ( مانند فرمالدهید و بنزن ) ، هوای تمیزتری را به شما هدیه می‌دهد.\r\nشرایط مطلوب زاموفیلیا در گلدان سفید :\r\n\r\nتقریبا هر مکانی برای آن مناسب است، چون در اکثر شرایط محیطی حتی خشکی و سایه هم به رشد خود ادامه می‌دهد. در نظر داشته باشید زاموفیلیا نباید بیش از 80 سانتی‌متر در گلدان اولیه رشد کند.\r\nشرایط نامناسب :\r\n\r\nآن را از نور مستقیم خورشید در فصل تابستان دور نگه دارید و بیش از حد آبیاری نکنید.\r\nروش نگهداری زاموفیلیا:\r\n\r\nنگهداری از گیاه زاموفیلیا خیلی راحت است. در بهار و تابستان هر 15 روز و در فصل‌های سرد ماهی یک بار به آن آب بدهید. همیشه اجازه بدهید که چند سانتی‌متر از سطح خاک خشک شود و سپس آب را اضافه کنید. گاهی ممکن است در زمستان بیش از یک ماه طول بکشد تا خاک خشک شود، پس در آبیاری عجله نکنید. یک کود متعادل را انتخاب کنید و سالی سه مرتبه به گیاه اضافه کنید تا در فصل تابستان، منتظر رویش جوانه‌های تازه باشید.', 1, 1748896956),
(8, 2, 'دیش گاردن سرامیکی کاکتوس', 1, NULL, NULL, '6 عدد کاکتوس‌های مختلف\r\nدیش گاردن سفید که گیاهان درون آن قرار گرفته‌اند.\r\nاین محصول دارای ارتفاع حدود 25 و عرض 23 سانتی‌متر است.\r\nکارت پستال رایگان با متن دلخواه شما', 726000, 0, '', 'Dishgarden-cactus.jpg,1748897346Dishgarden-cactus-Dimensions.jpg', '', 1, 1748897346),
(9, 2, 'افوربیااره ای', 1, NULL, NULL, 'طول : 25 سانتی‌متر\r\nعرض : 25 سانتی‌متر\r\nبازه ارتفاع : از 70 سانتی‌متر تا 80 سانتی‌متر\r\nگلدان همراه : ارتفاع 25 سانتی‌متر با قطر دهنه 25 سانتی‌متر', 1244000, 0, '', 'kaktoos-arei-model01.jpg,1748897624kaktoos-arei-model01-Dimension.jpg', '', 1, 1748897624),
(10, 2, 'کراسولا یشم', 0, NULL, NULL, 'طول : 23 سانتی‌متر\r\nعرض : 23 سانتی‌متر\r\nبازه ارتفاع : از 30 سانتی‌متر تا 35 سانتی‌متر\r\nگلدان همراه : ارتفاع 9 سانتی‌متر با قطر دهنه 23 سانتی‌متر', 583000, 500000, '', 'kerasoola-yashm-model01-768x768.jpg,1748899041kerasoola-yashm-model01-768x768.jpg', '', 1, 1748899041),
(11, 6, 'گلدان حصیری سه پایه کوتاه', 1, NULL, NULL, 'گلدان حصیری سه پایه کوتاه گلدانی با ظاهری دوست داشتنی است که می‌توانید گیاهان در ابعاد متوسط را درون آن کاشته و فضای منزل خود را زیباتر کنید.', 350000, 0, 'کرم - قهوه ای', '1748901708dark-wicker-vase-short-tripod.jpg,1748901708light-wicker-vase-short-tripod.jpg,1748901708wicker-vase-short-tripod-size.jpg', 'گلدان‌های حصیری یکی از گلدان‌های پرطرفدار است که گیاهان بسیاری را می‌توانید در آن کاشته و نگهداری کنید. این گلدان‌ها به دلیل بافت طبیعی موجب نفوذ هوا به داخل گلدان شده و این جریان هوا برای حفظ ریشه گیاه بسیار مفید است. وزن کم این گلدان یکی از پارامترهای مفید آن که جابجایی آنرا آسان می‌سازد.\r\n\r\n    گلدان حصیری سه پایه کوتاه\r\n    این گلدان دارای ارتفاع 37 و قطر دهانه 30 سانتی‌متر است.', 1, 1748901708),
(12, 5, 'پدیلانتوس', 2, NULL, NULL, '', 700000, 670000, '', '17489018741.jpg,17489018742.jpg', '', 1, 1748901874);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `sid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(6555) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`sid`, `title`, `content`, `link`, `pic`) VALUES
(1, 'اسلایدر اول', NULL, NULL, '1.png'),
(2, 'اسلایدر دوم', NULL, NULL, '2.png'),
(3, 'اسلایدر سوم', NULL, NULL, '3.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `permission` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `family`, `mobile`, `address`, `email`, `username`, `password`, `avatar`, `permission`, `created_at`) VALUES
(1, 'امیر', ' دمیرچی لو', '09905541381', 'ایران', 'amirdamirchi2002@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, 2, 1724177813),
(7, 'سیاوش', 'قمیشی', '09119988776', NULL, 'siavash@gmail.com', 'siavash', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 1724177813);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `fk_catid` (`catid`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
