<!-- Start footer -->
<footer class='main-footer dt-sl'>
    <div class='back-to-top'>
        <a href='#'><span class='icon'><i class='mdi mdi-chevron-up'></i></span> <span>بازگشت به بالا</span></a>
    </div>
    <div class='container main-container'>
        <div class='footer-services'>
            <div class='row'>
                <div class='service-item col'>
                    <a href='javascript:;' target='_blank'>
                        <img src='assets/img/svg/delivery.svg'>
                    </a>
                    <p>تحویل اکسپرس</p>
                </div>
                <div class='service-item col'>
                    <a href='javascript:;' target='_blank'>
                        <img src='assets/img/svg/contact-us.svg'>
                    </a>
                    <p>پشتیبانی 24 ساعته</p>
                </div>
                <div class='service-item col'>
                    <a href='javascript:;' target='_blank'>
                        <img src='assets/img/svg/return-policy.svg'>
                    </a>
                    <p>۷ روز ضمانت بازگشت</p>
                </div>
                <div class='service-item col'>
                    <a href='javascript:;' target='_blank'>
                        <img src='assets/img/svg/origin-guarantee.svg'>
                    </a>
                    <p>ضمانت اصل بودن کالا</p>
                </div>
            </div>
        </div>
        <div class='footer-widgets'>
            <div class='row'>
                <div class='col-12 col-md-6 col-lg-3'>
                    <div class='newsletter'>
                        <p>از تخفیف‌ها و جدیدترین‌های فروشگاه باخبر شوید:</p>
                        <form action=''>
                            <input type='email' class='form-control'
                                   placeholder='آدرس ایمیل خود را وارد کنید...'>
                            <input type='submit' class='btn btn-primary' value='ارسال'>
                        </form>
                    </div>
                    <div class='socials'>
                        <p>ما را در شبکه‌های اجتماعی دنبال کنید.</p>
                        <div class='footer-social'>
                            <ul class='text-center'>
                                <li><a href='#'><i class='mdi mdi-instagram'></i></a></li>
                                <li><a href='#'><i class='mdi mdi-telegram'></i></a></li>
                                <li><a href='#'><i class='mdi mdi-facebook'></i></a></li>
                                <li><a href='#'><i class='mdi mdi-twitter'></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class='info'>
            <div class='row'>
                <div class='col-12 text-right'>
                    <span>هفت روز هفته، 24 ساعت شبانه‌روز پاسخگوی شما هستیم.</span>
                </div>
            </div>
        </div>
    </div>
    <div class='description'>
        <div class='container main-container'>
            <div class='row'>
                <div class='site-description col-12 col-lg-7'>
                    <h1 class='site-title'>فروشگاه اینترنتی ، بررسی، انتخاب و خرید آنلاین</h1>
                    <p>
                        تاپ کالا به عنوان یکی از قدیمی‌ترین فروشگاه‌های اینترنتی با بیش از یک دهه تجربه، با
                        پایبندی به سه اصل کلیدی، پرداخت در
                        محل، 7 روز ضمانت بازگشت کالا و تضمین اصل‌بودن کالا، موفق شده تا همگام با فروشگاه‌های
                        معتبر جهان، به بزرگ‌ترین فروشگاه
                        اینترنتی ایران تبدیل شود. به محض ورود به تاپ کالا با یک سایت پر از کالا رو به رو
                        می‌شوید! هر آنچه که نیاز دارید و به
                        ذهن شما خطور می‌کند در اینجا پیدا خواهید کرد.
                    </p>
                </div>
                <div class='symbol col-12 col-lg-5'>
                    <a href='#' target='_blank'><img src='assets/img/symbol-01.png' alt=''></a>
                    <a href='#' target='_blank'><img src='assets/img/symbol-02.png' alt=''></a>
                    <a href='#' target='_blank'><img src='assets/img/sn.png' style="width: 9rem; height: 9rem" alt=''></a>
                </div>
            </div>
        </div>
    </div>
    <div class='copyright'>
        <div class='container main-container'>
<!--            <p>-->
<!--                استفاده از مطالب فروشگاه اینترنتی تاپ کالا فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است.-->
<!--                کلیه حقوق این سایت متعلق-->
<!--                به شرکت نوآوران فن آوازه (فروشگاه آنلاین تاپ کالا) می‌باشد.-->
<!--            </p>-->
        </div>
    </div>
</footer>
<!-- End footer -->
</div>

<!-- Core JS Files -->
<script src='./assets/js/vendor/jquery-3.4.1.min.js'></script>
<script src='./assets/js/vendor/popper.min.js'></script>
<script src='./assets/js/vendor/bootstrap.min.js'></script>
<!-- Plugins -->
<script src='./assets/js/vendor/owl.carousel.min.js'></script>
<script src='./assets/js/vendor/jquery.horizontalmenu.js'></script>
<script src='./assets/js/vendor/jquery.nice-select.min.js'></script>
<script src='./assets/js/vendor/nouislider.min.js'></script>
<script src="./assets/js/vendor/jquery.fancybox.min.js"></script>
<script src='./assets/js/vendor/wNumb.js'></script>
<script src='./assets/js/vendor/ResizeSensor.min.js'></script>
<script src='./assets/js/vendor/theia-sticky-sidebar.min.js'></script>
<script src='./assets/js/vendor/sweetalert.js'></script>

<!-- Main JS File -->
<script src='./assets/js/main.js'></script>

<?php
if (isset($_SESSION['message'])) {
    ?>
    <script>
        Swal.fire({
            title: "<?php echo $_SESSION['message']['title'] ?>",
            text: '<?php echo $_SESSION['message']['text'] ?>',
            icon: '<?php echo $_SESSION['message']['type'] ?>',
            confirmButtonText: 'متوجه شدم!',
        })
    </script>
    <?php
    unset($_SESSION['message']);
}
?>
</body>
</html>
