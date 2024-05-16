<!-- Start header-shopping -->
<header class="header-shopping dt-sl">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <div class="header-shopping-logo dt-sl">
                    <a href="#">
                        <img src="./assets/img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-12 text-center">
                <ul class="checkout-steps">
                    <li>
                        <a href="#" class="active">
                            <span>اطلاعات ارسال</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#" class="active">
                            <span>پرداخت</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#" class="active">
                            <span>اتمام خرید و ارسال</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- End header-shopping -->

<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">

        <div class="row">
            <div class="cart-page-content col-12 px-0">
                <div class="checkout-alert dt-sn mb-4">
                    <div class="circle-box-icon successful">
                        <i class="mdi mdi-check-bold"></i>
                    </div>
                    <?php
                        $tracking_code = $_GET['tracking_code']
                    ?>
                    <div class="checkout-alert-title">
                        <h4> سفارش <span
                                    class="checkout-alert-highlighted checkout-alert-highlighted-success"><?php echo $tracking_code?></span>
                            با موفقیت در سیستم ثبت شد.
                        </h4>
                    </div>
                    <div class="checkout-alert-content">
                        <p class="checkout-alert-content-success">
                            سفارش نهایتا تا یک روز آماده ارسال خواهد شد.
                        </p>
                    </div>
                </div>
                <section class="checkout-details dt-sl dt-sn mt-4 pt-2 pb-3 pr-3 pl-3 mb-5 px-res-1">
                    <div class="checkout-details-title">
                        <h4>
                            کد سفارش:
                            <span><?php echo $tracking_code?></span>
                        </h4>
                        <div class="row">
                            <div class="col-lg-9 col-md-8 col-sm-12">
                                <div class="checkout-details-title">
                                    <p>
                                        سفارش شما با موفقیت در سیستم ثبت شد و هم اکنون
                                        <span class="text-highlight text-highlight-success">تکمیل شده</span>
                                        است.
                                        جزئیات این سفارش را می‌توانید با کلیک بر روی دکمه
                                        <a href="#" class="border-bottom-dt">پیگیری سفارش</a>
                                        مشاهده نمایید.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <a href="#"
                                   class="btn-primary-cm bg-secondary btn-with-icon d-block text-center pr-0">
                                    <i class="mdi mdi-shopping"></i>
                                    پیگیری سفارش
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 px-res-0">
                                <div class="checkout-table">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                نام تحویل گیرنده:
                                                <span>
                                                            جلال بهرامی راد
                                                        </span></p>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                شماره تماس :
                                                <span>
                                                            ۰۹۰۳۰۸۱۳۷۴۲
                                                        </span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                تعداد مرسوله :
                                                <span>
                                                            ۱
                                                        </span></p>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                مبلغ کل:
                                                <span>
                                                            ۴,۴۳۹,۰۰۰ تومان
                                                        </span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                روش پرداخت:
                                                <span>
                                                            پرداخت اینترنتی
                                                            <span class="green">
                                                                (موفق)
                                                            </span></span></p>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                وضعیت سفارش:
                                                <span>
                                                            پرداخت شد
                                                        </span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>آدرس : استان خراسان شمالی
                                                ، شهربجنورد، خراسان شمالی-بجنورد</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Start Product-Slider -->
            <!-- End Product-Slider -->
        </div>

    </div>
</main>
<!-- End main-content -->