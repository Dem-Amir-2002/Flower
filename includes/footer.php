<footer>
    <div class="container-fluid p-3">
        <div class="container bg-white rounded">
            <div class="row pb-4 pt-2 align-items-center text-secondary">
                <div class="col-md-6 col-12">
                    <p>شنبه تا چهارشنبه از ساعت ۹ - ۱۷ و پنجشنبه‌ها از ساعت ۹ - ۱۳ پاسخگوی شما هستیم</p>
                    <p>برای مشاوره رایگان با ما تماس بگیرید: 1111-021</p>
                </div>
                <div class="col-md-6 col-12 text-center">
                    <a href="#"><img src="img/enamad.png" alt="" class="img-fluid bg-white rounded py-3 "></a>
                    <a href="#"><img src="img/samandehi.png" alt="" class="img-fluid bg-white rounded py-3 px-2"></a>
                    <a href="#"><img src="img/etehadie.png" alt="" class="img-fluid bg-white rounded py-3"></a>
                </div>
            <div class="col-md-6 col-12">
                <p>کلیه حقوق این سایت متعلق به "کافه موبایل" می‌باشد.</p>
            </div>
            <div class="col-md-6 col-12 text-center text-success">
                <i class="fab fa-linkedin-in" style="font-size: 1.8rem"></i>
                <i class="fab fa-instagram mx-3" style="font-size: 1.8rem"></i>
                <i class="fab fa-telegram-plane" style="font-size: 1.8rem"></i>
            </div>
        </div>
        </div>
    </div>

</footer>
<!-- js -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script>
    $('.colleague').owlCarousel({
        rtl: true,
        responsiveClass: true,
        margin: 30,
        dots: true,
        autoplay: 2400,
        loop: true,
        autoplayStopOnLast: false,
        autoWidth: false,
        nav: true,
        navText: ["<i class='fa fa-angle-right'></i>", "<i class='fa fa-angle-left'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            800: {
                items: 3
            },
            1200: {
                items: 5
            }

        }
    });
</script>
<script>
    document.querySelectorAll('.toggle-password').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const input = this.closest('.input-group').querySelector('.password-input');
            const icon = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });
</script>
<script>
    const rangeInput = document.getElementById('priceRange');
    const priceLabel = document.getElementById('priceValue');
    priceLabel.textContent = parseInt(rangeInput.value).toLocaleString();

    rangeInput.addEventListener('change', function () {
        priceLabel.textContent = parseInt(this.value).toLocaleString();
        console.log('قیمت انتخاب شده: ', this.value);
    });
</script>


</body>
</html>