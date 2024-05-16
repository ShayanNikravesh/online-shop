
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
                                                <a href="javascript:;" class="active">
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
                                <div
                                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                    <h2>علاقمندی ها</h2>
                                </div>
                                <div class="dt-sl">
                                    <?php
                                    $favorites=GetFavorites($_SESSION['user_sing']);
                                    ?>
                                    <div class="row">
                                        <?php
                                            if ($favorites){
                                                foreach ($favorites as $favorite){
                                        ?>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card-horizontal-product">
                                                <div class="card-horizontal-product-content">
                                                    <div class="card-horizontal-product-title">
                                                            <h3><?php echo $favorite['product_title'] ?></h3>
                                                    </div>
                                                    <?php
                                                        if (empty($favorite['product_price_discounted'])){
                                                    ?>
                                                            <div class="card-horizontal-product-price">
                                                                <span><?php echo priceFormatter($favorite['product_price']) ?></span>
                                                            </div>
                                                    <?php
                                                        }else{
                                                    ?>
                                                            <div class="card-horizontal-product-price">
                                                                <del class="price"><?php echo priceFormatter($favorite['product_price']) ?></del>
                                                            </div>
                                                            <div class="card-horizontal-product-price">
                                                                <span class="price text-danger"><?php echo priceFormatter($favorite['product_price_discounted']) ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <div class="card-horizontal-product-buttons">
                                                        <a target="_blank" href="<?php echo productUrl($favorite['product_tracking_code']) ?>" class="btn-sm btn-primary">مشاهده محصول</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
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
