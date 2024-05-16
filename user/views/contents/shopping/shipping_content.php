<?php
$cart_products = $_SESSION['cart_user']['products'];
$total_amount = $_SESSION['cart_user']['summary']['total_amount'];
$amount_payable = $_SESSION['cart_user']['summary']['amount_payable'];
$number_product = count($cart_products);
?>

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
                    <li>
                        <a href="#">
                            <span>پرداخت</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
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
            <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                    <h2>انتخاب آدرس تحویل سفارش</h2>
                </div>
                <section class="page-content dt-sl">
                    <?php
                    if ($defaultAddress) {
                        ?>
                        <div class="address-section">
                            <div class="checkout-contact dt-sn rounded-0 px-0 pt-0 pb-0">
                                <div class="checkout-contact-content">
                                    <ul class="checkout-contact-items">
                                        <li class="checkout-contact-item">
                                            گیرنده:
                                            <span class="full-name"><?php echo $defaultAddress['full_name'] ?></span>
                                        </li>
                                        <li class="checkout-contact-item">
                                            <div class="checkout-contact-item checkout-contact-item-mobile">
                                                شماره تماس:
                                                <span class="mobile-phone"><?php echo $defaultAddress['mobile'] ?></span>
                                            </div>
                                            <div class="checkout-contact-item-message">
                                                کد پستی:
                                                <span class="post-code"><?php echo $defaultAddress['post_code'] ?></span>
                                            </div>
                                            <br>
                                            <span class="address-part"><?php echo $defaultAddress['full_address'] ?></span>
                                        </li>
                                    </ul>
                                    <a class="checkout-contact-location" id="btn-checkout-contact-location">تغییر آدرس ارسال</a>
                                    <div class="checkout-contact-badge">
                                        <i class="mdi mdi-check-bold"></i>
                                    </div>
                                </div>
                                <div class="checkout-address dt-sn px-0 pt-0 pb-0 rounded-0" id="user-address-list-container">
                                    <div class="checkout-address-content">
                                        <?php
                                            $user_id = $_SESSION['user_sing'];
                                            $addresses = getAddresses($user_id);
                                        ?>
                                        <div class="checkout-address-headline">آدرس مورد نظر خود را جهت تحویل انتخاب فرمایید:</div>
                                        <?php
                                            if($addresses){
                                                foreach ($addresses as $address){
                                        ?>
                                        <div class="checkout-address-row">
                                            <div class="checkout-address-col">
                                                <div class="checkout-address-box is-selected">
                                                    <h5 class="checkout-address-title"><?php echo $address['full_name']?></h5>
                                                    <p class="checkout-address-text">
                                                            <span><?php echo $address['full_address']?></span>
                                                    </p>
                                                    <ul class="checkout-address-list">
                                                        <li>
                                                            <ul class="checkout-address-contact-info">
                                                                <li class="">کدپستی: <span><?php echo $address['post_code']?></span></li>
                                                            </ul>
                                                            <ul class="checkout-address-contact-info">
                                                                <li>شماره همراه: <span><?php echo $address['mobile']?></span></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div id="parentDivButton<?= $address['id'] ?>">
                                                    <?php
                                                        if ($address['is_default']=== 'no')
                                                            {
                                                    ?>
                                                            <button id="addressButton<?= $address['id'] ?>" type="button" class="checkout-address-btn-submit" onclick="defaultAddress(<?php echo $address['id']?> , <?php echo $_SESSION['user_sing'] ?>);" >انتخاب این آدرس به عنوان آدرس پیش فرض.</button>
                                                    <?php
                                                            }
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                    <button class="checkout-address-cancel" id="cancel-change-address-btn"></button>
                                </div>
                                <!-- Start Modal location new -->
                                <div class="modal fade" id="modal-location" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg send-info modal-dialog-centered"
                                         role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                    <i class="now-ui-icons location_pin"></i>
                                                    افزودن آدرس جدید
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-ui dt-sl">
                                                            <form class="form-account" action="">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12 mb-2">
                                                                        <div class="form-row-title">
                                                                            <h4>
                                                                                نام و نام خانوادگی
                                                                            </h4>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <input class="input-ui pr-2 text-right"
                                                                                   type="text"
                                                                                   placeholder="نام خود را وارد نمایید">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 mb-2">
                                                                        <div class="form-row-title">
                                                                            <h4>
                                                                                شماره موبایل
                                                                            </h4>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <input
                                                                                    class="input-ui pl-2 dir-ltr text-left"
                                                                                    type="text"
                                                                                    placeholder="09xxxxxxxxx">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 mb-2">
                                                                        <div class="form-row-title">
                                                                            <h4>
                                                                                استان
                                                                            </h4>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="custom-select-ui">
                                                                                <select class="right">
                                                                                    <option value="khrasan-north">
                                                                                        خراسان شمالی
                                                                                    </option>
                                                                                    <option value="tehran">
                                                                                        تهران
                                                                                    </option>
                                                                                    <option value="esfahan">
                                                                                        اصفهان
                                                                                    </option>
                                                                                    <option value="shiraz">
                                                                                        شیراز
                                                                                    </option>
                                                                                    <option value="tabriz">
                                                                                        تبریز
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 mb-2">
                                                                        <div class="form-row-title">
                                                                            <h4>
                                                                                شهر
                                                                            </h4>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="custom-select-ui">
                                                                                <select class="right">
                                                                                    <option value="bojnourd">
                                                                                        بجنورد
                                                                                    </option>
                                                                                    <option value="garme">
                                                                                        گرمه
                                                                                    </option>
                                                                                    <option value="shirvan">
                                                                                        شیروان
                                                                                    </option>
                                                                                    <option value="mane">
                                                                                        مانه و سملقان
                                                                                    </option>
                                                                                    <option value="esfarayen">
                                                                                        اسفراین
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <div class="form-row-title">
                                                                            <h4>
                                                                                آدرس پستی
                                                                            </h4>
                                                                        </div>
                                                                        <div class="form-row">
                                                                                <textarea
                                                                                        class="input-ui pr-2 text-right"
                                                                                        placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <div class="form-row-title">
                                                                            <h4>
                                                                                کد پستی
                                                                            </h4>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <input
                                                                                    class="input-ui pl-2 dir-ltr text-left placeholder-right"
                                                                                    type="text"
                                                                                    placeholder=" کد پستی را بدون خط تیره بنویسید">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 pr-4 pl-4">
                                                                        <button type="button"
                                                                                class="btn btn-sm btn-primary btn-submit-form">ثبت
                                                                            و
                                                                            ارسال به این آدرس</button>
                                                                        <button type="button"
                                                                                class="btn-link-border float-left mt-2">انصراف
                                                                            و بازگشت</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <!-- Google Map Start -->
                                                        <div class="goole-map">
                                                            <div id="map" style="height:440px"></div>
                                                        </div>
                                                        <!-- Google Map End -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal location new -->

                                <!-- Start Modal location edit -->
                                <div class="modal fade" id="modal-location-edit" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg send-info modal-dialog-centered"
                                         role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                    <i class="now-ui-icons location_pin"></i>
                                                    ویرایش آدرس
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-ui dt-sl">
                                                            <form class="form-account" action="">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12 mb-2">
                                                                        <div class="form-row-title">
                                                                            <h4>
                                                                                نام و نام خانوادگی
                                                                            </h4>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <input class="input-ui pr-2 text-right"
                                                                                   type="text"
                                                                                   placeholder="نام خود را وارد نمایید">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 mb-2">
                                                                        <div class="form-row-title">
                                                                            <h4>
                                                                                شماره موبایل
                                                                            </h4>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <input
                                                                                    class="input-ui pl-2 dir-ltr text-left"
                                                                                    type="text"
                                                                                    placeholder="09xxxxxxxxx">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 mb-2">
                                                                        <div class="form-row-title">
                                                                            <h4>
                                                                                استان
                                                                            </h4>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="custom-select-ui">
                                                                                <select class="right">
                                                                                    <option value="khrasan-north">
                                                                                        خراسان شمالی
                                                                                    </option>
                                                                                    <option value="tehran">
                                                                                        تهران
                                                                                    </option>
                                                                                    <option value="esfahan">
                                                                                        اصفهان
                                                                                    </option>
                                                                                    <option value="shiraz">
                                                                                        شیراز
                                                                                    </option>
                                                                                    <option value="tabriz">
                                                                                        تبریز
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 mb-2">
                                                                        <div class="form-row-title">
                                                                            <h4>
                                                                                شهر
                                                                            </h4>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="custom-select-ui">
                                                                                <select class="right">
                                                                                    <option value="bojnourd">
                                                                                        بجنورد
                                                                                    </option>
                                                                                    <option value="garme">
                                                                                        گرمه
                                                                                    </option>
                                                                                    <option value="shirvan">
                                                                                        شیروان
                                                                                    </option>
                                                                                    <option value="mane">
                                                                                        مانه و سملقان
                                                                                    </option>
                                                                                    <option value="esfarayen">
                                                                                        اسفراین
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <div class="form-row-title">
                                                                            <h4>
                                                                                آدرس پستی
                                                                            </h4>
                                                                        </div>
                                                                        <div class="form-row">
                                                                                <textarea
                                                                                        class="input-ui pr-2 text-right"
                                                                                        placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <div class="form-row-title">
                                                                            <h4>
                                                                                کد پستی
                                                                            </h4>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <input
                                                                                    class="input-ui pl-2 dir-ltr text-left placeholder-right"
                                                                                    type="text"
                                                                                    placeholder=" کد پستی را بدون خط تیره بنویسید">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 pr-4 pl-4">
                                                                        <button type="button"
                                                                                class="btn btn-sm btn-primary btn-submit-form">ثبت
                                                                            و
                                                                            ارسال به این آدرس</button>
                                                                        <button type="button"
                                                                                class="btn-link-border float-left mt-2">انصراف
                                                                            و بازگشت</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <!-- Google Map Start -->
                                                        <div class="goole-map">
                                                            <div id="map-edit" style="height:440px"></div>
                                                        </div>
                                                        <!-- Google Map End -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal location edit -->

                                <!-- Start Modal remove-location -->
                                <div class="modal fade" id="remove-location" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mb-3" id="exampleModalLabel">آیا مطمئنید که
                                                    این آدرس حذف شود؟</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="remodal-general-alert-button remodal-general-alert-button--cancel"
                                                        data-dismiss="modal">خیر</button>
                                                <button type="button"
                                                        class="remodal-general-alert-button remodal-general-alert-button--approve">بله</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal remove-location -->
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-danger">
                            <div class="alert-text">آدرس پیشفرضی وجود ندارد!</div>
                        </div>
                        <?php
                    }
                    ?>
                    <form method="post" id="shipping-data-form" class="dt-sn pt-3 pb-3">
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                            <h2>انتخاب نحوه ارسال</h2>
                        </div>
                        <div class="checkout-shipment mb-4">
                            <div class="custom-control custom-radio pl-0 pr-3">
                                <input type="radio" class="custom-control-input" name="radio1" id="radio1" value="option1" checked>
                                <label for="radio1" class="custom-control-label">
                                    عادی
                                </label>
                            </div>
                        </div>
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                            <h2>مرسوله ۱ از ۱</h2>
                        </div>
                        <div class="checkout-pack">
                            <section class="products-compact">
                                <!-- Start Product-Slider -->
                                <div class="col-12">
                                    <div class="products-compact-slider carousel-md owl-carousel owl-theme">
                                        <?php
                                        foreach ($cart_products as $product)
                                        {
                                            $DetailsProducts = getDetailsProductsByID($product["id"])
                                            ?>
                                            <div class="item">
                                                <div class="product-card mb-3">
                                                    <a class="product-thumb" href="<?php echo productUrl($DetailsProducts['tracking_code']) ?>">
                                                        <?php
                                                        if (empty($DetailsProducts["photo_name"])) {
                                                            ?>
                                                            <img height="150" width="150" src="<?php echo normalizePath(DOMAINS['public'], '/images/180.png'); ?>" alt='Product Thumbnail'>
                                                            <?php
                                                        }else
                                                        {
                                                            ?>
                                                            <img height="150" width="150" src="<?php echo normalizePath(DOMAINS['public'], $DetailsProducts["photo_src"] , $DetailsProducts["photo_name"]); ?>" alt='Product Thumbnail'>
                                                            <?php
                                                        }
                                                        ?>
                                                    </a>
                                                    <div class="product-card-body">
                                                        <h5 class="product-title">
                                                            <a href="<?php echo productUrl($DetailsProducts['tracking_code']) ?>"><?php echo $DetailsProducts["title"] ?></a>
                                                        </h5>
                                                        <a class='product-meta' href="<?php echo categoryUrl($DetailsProducts['category_id']) ?>"><?php  echo $DetailsProducts['category_title'] ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                                <!-- End Product-Slider -->
                            </section>
                        </div>
                    </form>
                    <div class="mt-5">
                        <a href="/cart.php" class="float-right border-bottom-dt"><i
                                class="mdi mdi-chevron-double-right"></i>بازگشت به سبد خرید</a>
                        <a href="javascript:;" class="float-left border-bottom-dt">تایید و ادامه ثبت سفارش<i
                                class="mdi mdi-chevron-double-left"></i></a>
                    </div>
                </section>
            </div>
            <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                <div class="dt-sn mb-2">
                    <ul class="checkout-summary-summary">
                        <li>
                            <span>مبلغ کل (<?php echo $number_product;?> کالا)</span>
                            <span><?php echo priceFormatter($total_amount)?></span>
                        </li>
                        <li class="checkout-summary-discount">
                            <span>سود شما از خرید</span>
                            <span><?php echo priceFormatter($total_amount - $amount_payable)?></span>
                        </li>
                        <li>
                                    <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip" data-html="true"
                                                           data-placement="bottom"
                                                           title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده متفاوت باشد. در صورتی که هر یک از مرسولات حداقل ارزشی برابر با ۱۵۰هزار تومان داشته باشد، آن مرسوله بصورت رایگان ارسال می‌شود.<br>'حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر باشد.'</p></div>">
                                            <span class="mdi mdi-information-outline"></span>
                                        </span></span><span>وابسته به آدرس</span>
                        </li>
                    </ul>
                    <div class="checkout-summary-devider">
                        <div></div>
                    </div>
                    <div class="checkout-summary-content">
                        <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                        <div class="checkout-summary-price-value">
                            <span class="checkout-summary-price-value-amount"><?php echo priceFormatter($amount_payable)?></span>

                        </div>
                        <form action="" method="post">
                            <input name="action" type="hidden" value="to_payment_step">
                            <a href="javascript:;" class="mb-2 d-block">
                                <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                                    <i class="mdi mdi-arrow-left"></i>
                                    تایید و ادامه ثبت سفارش
                                </button>
                            </a>
                        </form>
                        <div>
                                    <span>
                                        کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش
                                        مراحل بعدی را تکمیل کنید.
                                    </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                                 data-placement="bottom"
                                                 title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، دیجی‌کالا هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                        <span class="mdi mdi-information-outline"></span>
                                    </span></div>
                    </div>
                </div>
                <div class="dt-sn checkout-feature-aside pt-4">
                    <ul>
                        <li class="checkout-feature-aside-item">
                            <img src="./assets/img/svg/return-policy.svg" alt="">
                            هفت روز ضمانت تعویض
                        </li>
                        <li class="checkout-feature-aside-item">
                            <img src="./assets/img/svg/payment-terms.svg" alt="">
                            پرداخت در محل با کارت بانکی
                        </li>
                        <li class="checkout-feature-aside-item">
                            <img src="./assets/img/svg/delivery.svg" alt="">
                            تحویل اکسپرس
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</main>
<!-- End main-content -->