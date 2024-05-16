
<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <div class="row">
            <?php
            $user = getUserById($_SESSION['user_sing']);
            ?>
            <!-- Start Sidebar -->
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 sticky-sidebar">
                <div class="profile-sidebar dt-sl">
                    <div class="dt-sl dt-sn mb-3">
                        <div class="profile-sidebar-header dt-sl">
                            <div class="profile-avatar float-right">
                                <img src="./assets/img/theme/avatar.png" alt="">
                            </div>
                            <div class="profile-header-content mr-3 mt-2 float-right">
                                <span class="d-block profile-username"><?php echo $user['first_name'];?> <?php echo $user['last_name'] ?></span>
                                <span class="d-block profile-phone"><?php echo $user['mobile'];?></span>
                            </div>
                            <div class="profile-link mt-2 dt-sl">
                                <div class="row">
                                    <div class="col-3 text-center">
                                        <!--<a href="#">
                                            <i class="mdi mdi-lock-reset"></i>
                                            <span class="d-block">تغییر رمز</span>
                                        </a>-->
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="/logout.php">
                                            <i class="mdi mdi-logout-variant"></i>
                                            <span class="d-block">خروج از حساب</span>
                                        </a>
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dt-sl dt-sn mb-3">
                        <div class="profile-menu-section dt-sl">
                            <div class="label-profile-menu mt-2 mb-2">
                                <span>حساب کاربری شما</span>
                            </div>
                            <div class="profile-menu">
                                <ul>
                                    <li>
                                        <a href="/profile.php">
                                            <i class="mdi mdi-account-circle-outline"></i>
                                            پروفایل
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="active">
                                            <i class="mdi mdi-basket"></i>
                                            همه سفارش ها
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profile-favorites.php">
                                            <i class="mdi mdi-heart-outline"></i>
                                            لیست علاقمندی ها
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profile-comments.php">
                                            <i class="mdi mdi-glasses"></i>
                                            نقد و نظرات
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profile-addresses.php">
                                            <i class="mdi mdi-sign-direction"></i>
                                            آدرس ها
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->

            <!-- Start Content -->
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                            <h2>همه سفارش‌ها</h2>
                        </div>
                        <div class="dt-sl">
                            <?php
                                $orders = getOrders(authUser());
                            ?>
                            <div class="table-responsive">
                                <table class="table table-order">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>شماره سفارش</th>
                                        <th>تاریخ ثبت سفارش</th>
                                        <th>مبلغ کل</th>
                                        <th>مبلغ قابل پرداخت</th>
                                        <th>وضعیت پرداخت</th>
                                        <th>جزئیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if ($orders){
                                            foreach($orders as $key => $order){
                                    ?>
                                                <tr>
                                                    <td><?php echo $key + 1 ?></td>
                                                    <td><?php echo $order['tracking_code'] ?></td>
                                                    <td><?php echo created_at($order['created_at']);?>
                                                    </td>
                                                    <td><?php echo number_format($order['total_amount']) ?></td>
                                                    <td><?php echo number_format($order['amount_payable']) ?></td>
                                                    <td><?php echo status($order['status']) ?></td>
                                                    <td class="details-link">
                                                        <a href="<?php echo orderUrl($order['tracking_code']) ?>">
                                                            <i class="mdi mdi-chevron-left"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->
        </div>

        <!-- Start Product-Slider -->
        <section class="slider-section dt-sl mt-5 mb-5">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="section-title text-sm-title title-wide no-after-title-wide">
                        <h2>محصولات پیشنهادی برای شما</h2>
                        <a href="#">مشاهده همه</a>
                    </div>
                </div>

                <!-- Start Product-Slider -->
                <div class="col-12 px-res-0">
                    <div class="product-carousel carousel-lg owl-carousel owl-theme">
                        <div class="item">
                            <div class="product-card mb-3">
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                    </div>
                                    <div class="discount">
                                        <span>20%</span>
                                    </div>
                                </div>
                                <a class="product-thumb" href="shop-single.html">
                                    <img src="./assets/img/products/07.jpg" alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <h5 class="product-title">
                                        <a href="shop-single.html">مانتو زنانه</a>
                                    </h5>
                                    <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                    <span class="product-price">157,000 تومان</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-card mb-3">
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                    </div>
                                </div>
                                <a class="product-thumb" href="shop-single.html">
                                    <img src="./assets/img/products/017.jpg" alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <h5 class="product-title">
                                        <a href="shop-single.html">کت مردانه</a>
                                    </h5>
                                    <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                    <span class="product-price">199,000 تومان</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-card mb-3">
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star"></i>
                                    </div>
                                </div>
                                <a class="product-thumb" href="shop-single.html">
                                    <img src="./assets/img/products/013.jpg" alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <h5 class="product-title">
                                        <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                    </h5>
                                    <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                    <span class="product-price">135,000 تومان</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-card mb-3">
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star"></i>
                                    </div>
                                </div>
                                <a class="product-thumb" href="shop-single.html">
                                    <img src="./assets/img/products/09.jpg" alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <h5 class="product-title">
                                        <a href="shop-single.html">مانتو زنانه</a>
                                    </h5>
                                    <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                    <span class="product-price">145,000 تومان</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-card mb-3">
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                    </div>
                                </div>
                                <a class="product-thumb" href="shop-single.html">
                                    <img src="./assets/img/products/010.jpg" alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <h5 class="product-title">
                                        <a href="shop-single.html">مانتو زنانه</a>
                                    </h5>
                                    <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                    <span class="product-price">170,000 تومان</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-card mb-3">
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star"></i>
                                    </div>
                                    <div class="discount">
                                        <span>20%</span>
                                    </div>
                                </div>
                                <a class="product-thumb" href="shop-single.html">
                                    <img src="./assets/img/products/011.jpg" alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <h5 class="product-title">
                                        <a href="shop-single.html">مانتو زنانه</a>
                                    </h5>
                                    <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                    <span class="product-price">185,000 تومان</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-card mb-3">
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star"></i>
                                    </div>
                                </div>
                                <a class="product-thumb" href="shop-single.html">
                                    <img src="./assets/img/products/019.jpg" alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <h5 class="product-title">
                                        <a href="shop-single.html">تیشرت مردانه</a>
                                    </h5>
                                    <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                    <span class="product-price">54,000 تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Product-Slider -->

            </div>
        </section>
        <!-- End Product-Slider -->
    </div>
</main>
<!-- End main-content -->