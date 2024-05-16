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
                                            <a href="javascript:;" class="active">
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
                        <div class="col-xl-6 col-lg-12">
                            <div class="px-3">
                                <div
                                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2">
                                    <h2>اطلاعات شخصی</h2>
                                </div>
                                <div class="profile-section dt-sl">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>نام و نام خانوادگی:</span>
                                            </div>
                                            <div class="value-info">
                                                <span><?php echo $user['first_name'];?> <?php echo $user['last_name'] ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>پست الکترونیک:</span>
                                            </div>
                                            <div class="value-info">
                                                <span><?php echo $user['email'];?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>شماره تلفن همراه:</span>
                                            </div>
                                            <div class="value-info">
                                                <span><?php echo $user['mobile'];?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>کد ملی:</span>
                                            </div>
                                            <div class="value-info">
                                                <span><?php echo $user['national_code'];?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12"></div>
                                        <div class="col-md-6 col-sm-12"></div>
                                    </div>
                                    <div class="profile-section-link">
                                        <a href="/update_profile.php" class="border-bottom-dt">
                                            <i class="mdi mdi-account-edit-outline"></i>
                                            ویرایش اطلاعات شخصی
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12">
                            <div class="px-3">
                                <div
                                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2">
                                    <h2>لیست علاقه‌مندی‌ها</h2>
                                </div>
                                <div class="profile-section dt-sl">
                                    <?php
                                        $favorites=GetFavorites($_SESSION['user_sing']);
                                    ?>
                                    <ul class="list-favorites">
                                        <?php
                                        if ($favorites){
                                            foreach ($favorites as $favorite){
                                        ?>
                                                <li>
                                                    <a target="_blank" href="<?php echo productUrl($favorite['product_tracking_code']) ?>">
                                                        <span><?php echo $favorite['product_title'] ?></span>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                    <div class="profile-section-link">
                                        <a href="/profile-favorites.php" class="border-bottom-dt">
                                            <i class="mdi mdi-square-edit-outline"></i>
                                            مشاهده و ویرایش لیست مورد علاقه
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div
                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                <h2>آخرین سفارش‌ها</h2>
                            </div>
                            <div class="dt-sl">
                                <?php
                                $latest_orders = getLatestOrders(authUser());
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
                                        if ($latest_orders){
                                            foreach($latest_orders as $key => $order){
                                                ?>
                                                <tr>
                                                    <td><?php echo $key + 1 ?></td>
                                                    <td><?php echo $order['tracking_code'] ?></td>
                                                    <td><?php $dateg = $order['created_at'];
                                                        $explode1=explode(' ',$dateg);
                                                        $explode2=explode('-',$explode1['0']);
                                                        $datej=gregorian_to_jalali($explode2['0'],$explode2['1'],$explode2['2'],'/');
                                                        echo $datej; ?>
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
                                        <tr>
                                            <td class="link-to-orders" colspan="7"><a href="/profile-orders.php">مشاهده همه سفارش ها</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Content -->

            </div>
        </div>
    </main>
 <!-- End main-content -->
