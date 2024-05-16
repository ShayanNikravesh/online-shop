<?php
$cart_products = $_SESSION['cart_user']['products'];
$total_amount = $_SESSION['cart_user']['summary']['total_amount'];
$amount_payable = $_SESSION['cart_user']['summary']['amount_payable'];
$number_product = count($cart_products);
?>

<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 mb-2 px-0">
                <nav class="tab-cart-page">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active"
                           id="nav-home-tab" data-toggle="tab" href="#nav-home"
                           role="tab" aria-controls="nav-home" aria-selected="true">
                            سبد خرید
                            <span class="count-cart"><?php echo $number_product;?></span>
                        </a>
                    </div>
                </nav>
            </div>
            <div class="col-12">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-xl-9 col-lg-8 col-12 px-0">
                                <div class="table-responsive checkout-content dt-sl">
                                    <div class="checkout-header checkout-header--express">
                                        <span class="checkout-header-title">ارسال عادی</span>
                                        <span class="checkout-header-extra-info">(<?php echo $number_product;?> کالا)</span>
                                    </div>
                                    <table class="table table-cart">
                                        <tbody>
                                            <?php
                                            foreach ($cart_products as $product)
                                            {
                                              $DetailsProducts = getDetailsProductsByID($product["id"])
                                            ?>
                                                <tr class="checkout-item">
                                                    <td>
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
                                                        <form method="post" class="test_<?php echo $product['id'] ?>">
                                                            <input type="hidden" name="action" value="delete_product_in_cart">
                                                            <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
                                                            <button class="checkout-btn-remove">&times;</button>
                                                        </form>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#">
                                                            <h3 class="checkout-title">
                                                                <?php echo $DetailsProducts["title"] ?>
                                                            </h3>
                                                        </a>
                                                        <div class="checkout-variant checkout-variant--color">
                                                            <!--<span class="checkout-variant-title">رنگ :</span>
                                                            <span class="checkout-variant-value">
                                                                    مشکی
                                                                <div class="checkout-variant-shape" style="background-color:#212121"></div>
                                                            </span>-->
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">تعداد</p>
                                                        <div class="number-input" data-product-id="<?php echo $DetailsProducts['id'] ?>">

                                                            <button type="button" data-event="decrement" class="btn-change-quantity"></button>

                                                            <input class="quantity"
                                                                   min="1" name="quantity"
                                                                   value="<?php echo $product["quantity"] ?>"
                                                                   type="number">

                                                            <button type="button" data-event="increment" class="btn-change-quantity plus"></button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php if(empty($DetailsProducts["price_discounted"]))
                                                        {
                                                            ?>
                                                        <strong><?php echo priceFormatter($DetailsProducts["price"])?></strong>
                                                        <?php }else
                                                        {?>
                                                            <strong class="text-danger"><?php echo priceFormatter($DetailsProducts["price_discounted"])?></strong>
                                                            <br>
                                                            <del><?php echo priceFormatter($DetailsProducts["price"])?></del>
                                                            <?php } ?>


                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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
                                    </ul>
                                    <div class="checkout-summary-devider">
                                        <div></div>
                                    </div>
                                    <div class="checkout-summary-content">
                                        <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                        <div class="checkout-summary-price-value">
                                            <span class="checkout-summary-price-value-amount"><?php echo priceFormatter($amount_payable)?></span>

                                        </div>
                                        <?php
                                        if (authUser()) {
                                            ?>
                                            <a href="/shipping.php" class="mb-2 d-block">
                                                <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0">
                                                    <i class="mdi mdi-arrow-left"></i>
                                                    ادامه و ثبت سفارش
                                                </button>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="/login.php" class="mb-2 d-block">
                                                <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0">
                                                    <i class="mdi mdi-arrow-left"></i>
                                                    ورود و ثبت سفارش
                                                </button>
                                            </a>
                                            <?php
                                        }
                                        ?>

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
                </div>
            </div>
        </div>

    </div>
</main>
<!-- End main-content -->