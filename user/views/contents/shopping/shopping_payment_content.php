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
                    <li class="active">
                        <a href="#" class="active">
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
            <div class="col-12">
                <?php
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        ?>
                        <div class="alert alert-<?php echo $error['icon'] ?>">
                            <div class="alert-text"><?php echo $error['title'] ?></div>
                            <div class="alert-text"><?php echo $error['message'] ?></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
                <section class="page-content dt-sl">
                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                        <h2>انتخاب شیوه پرداخت</h2>
                    </div>
                    <form method="post" id="shipping-data-form" class="dt-sn pt-3 pb-3 mb-4">
                        <div class="checkout-pack">
                            <div class="row">
                                <div class="checkout-time-table checkout-time-table-time">
                                    <div class="col-12">
                                        <div class="radio-box custom-control custom-radio pl-0 pr-3">
                                            <input type="radio" class="custom-control-input" name="post-pishtaz" id="1" value="1" checked>
                                            <label for="1" class="custom-control-label">
                                                <i class="mdi mdi-credit-card-outline checkout-additional-options-checkbox-image"></i>
                                                <div class="content-box">
                                                    <div class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                                                        پرداخت اینترنتی آیدی پی
                                                    </div>
                                                    <ul class="checkout-time-table-subtitle-bar">
                                                        <li>
                                                            آنلاین با تمامی کارت‌های بانکی
                                                        </li>
                                                    </ul>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                        <h2>خلاصه سفارش</h2>
                    </div>
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
                    <div class="row mt-4">
                        <div class="col-sm-6 col-12">
                            <div class="dt-sn pt-3 pb-3 px-res-1">
                                <p>با ثبت کد تخفیف، مبلغ کد تخفیف از “مبلغ قابل پرداخت” کسر می‌شود.</p>
                                <div class="form-ui">
                                    <form action="">
                                        <div class="row text-center">
                                            <div class="col-xl-8 col-lg-12 px-0">
                                                <div class="form-row">
                                                    <input type="text" class="input-ui pr-2" placeholder="مثلا 837A2CS">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-12 px-0">
                                                <button class="btn btn-primary mt-res-1">ثبت کد تخفیف</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="/shipping.php" class="float-right border-bottom-dt"><i class="mdi mdi-chevron-double-right"></i>بازگشت به شیوه ارسال</a>
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
                            <input name="action" type="hidden" value="to_gateway_payment">
                            <a href="javascript:;" class="mb-2 d-block">
                                <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                                    <i class="mdi mdi-arrow-left"></i>
                                    پرداخت و ثبت نهایی سفارش
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