
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
                                        <a href="/profile-orders.php">
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
                        <?php
                            $order_details = getDetailsOrders($_GET['tracking_code']);
                        ?>
                        <div class="profile-navbar">
                            <a href="/profile-orders.php" class="profile-navbar-btn-back">بازگشت</a>
                            <h4>سفارش <span class="font-en"><?php echo $order_details['tracking_code'] ?></span><span>ثبت شده در تاریخ
                                            <?php echo created_at($order_details['created_at']);?>
                                        </span>
                            </h4>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="dt-sl dt-sn">
                            <div class="row table-draught px-3">
                                <div class="col-md-6 col-sm-12">
                                    <span class="title">تحویل گیرنده:</span>
                                    <span class="value"><?php echo $order_details['receiver_first_name'] , ' ' , $order_details['receiver_last_name']?></span>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <span class="title">شماره تماس تحویل گیرنده:</span>
                                    <span class="value"><?php echo $order_details['receiver_mobile'] ?></span>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <span class="title">شهر مقصد:</span>
                                    <span class="value"><?php echo $order_details['city_name'] ?></span>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <span class="title">کد پستی:</span>
                                    <span class="value"><?php echo $order_details['receiver_postal_code'] ?></span>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <span class="title">نحوه ارسال سفارش:</span>
                                    <span class="value">پست</span>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <span class="title">هزینه ارسال:</span>
                                    <span class="value">رایگان</span>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <span class="title">مبلغ کل:</span>
                                    <span class="value"><?php echo priceFormatter($order_details['total_amount']) ?></span>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <span class="title">مبلغ قابل پرداخت:</span>
                                    <span class="value"><?php echo priceFormatter($order_details['amount_payable']) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->

        </div>

        <!-- Start Product-Slider -->
        <!-- End Product-Slider -->
    </div>
</main>
<!-- End main-content -->