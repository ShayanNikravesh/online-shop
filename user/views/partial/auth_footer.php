<!-- Start mini-footer -->
<footer class="mini-footer dt-sl">
    <div class="container main-container">
        <div class="row">
            <div class="col-12">
                <ul class="mini-footer-menu">
                    <li><a href="#">درباره دیدیکالا</a></li>
                    <li><a href="#">فرصت های شغلی</a></li>
                    <li><a href="#">تماس با ما</a></li>
                    <li><a href="#">همکاری با سازمان ها</a></li>
                </ul>
            </div>
            <div class="col-12 mt-2 mb-3">
                <div class="footer-light-text">
                    استفاده از مطالب فروشگاه اینترنتی دیدیکالا فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است. کلیه حقوق این سایت متعلق به (فروشگاه آنلاین دیدیکالا) می‌باشد.
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="copy-right-mini-footer">
                    Copyright © 2019 Didikala
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End mini-footer -->

</div>


<!-- Core JS Files -->
<script src="./assets/js/vendor/jquery-3.4.1.min.js"></script>
<script src="./assets/js/vendor/popper.min.js"></script>
<script src="./assets/js/vendor/bootstrap.min.js"></script>
<!-- Plugins -->
<script src="./assets/js/vendor/owl.carousel.min.js"></script>
<script src="./assets/js/vendor/isotope.pkgd.min.js"></script>
<script src="./assets/js/vendor/jquery.horizontalmenu.js"></script>
<script src="./assets/js/vendor/nouislider.min.js"></script>
<script src="./assets/js/vendor/wNumb.js"></script>
<script src="./assets/js/vendor/ResizeSensor.min.js"></script>
<script src="./assets/js/vendor/theia-sticky-sidebar.min.js"></script>
<script src="./assets/js/vendor/countdown.min.js"></script>
<script src='./assets/js/vendor/sweetalert.js'></script>
<!-- Main JS File -->
<script src="./assets/js/main.js"></script>

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