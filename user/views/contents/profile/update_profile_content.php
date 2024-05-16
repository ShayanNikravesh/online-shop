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
                        <div class="dt-sl  mb-3 text-center"></div>
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
                                <?php
                                echo initFormErrors();
                                ?>
                                <form class="form" method="post" action="">
                                    <input type="hidden" name="action" value="update_profile">
                                    <div class="profile-section dt-sl">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="label-info">
                                                    <span>نام:</span>
                                                </div>
                                                <input type="text" value="<?php echo $user['first_name'] ?>" name="first_name" class="form-control" placeholder="نام را وارد کنید...">
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="label-info">
                                                    <span>نام خانوادگی:</span>
                                                    <input type="text" value="<?php echo $user['last_name'] ?>" name="last_name" class="form-control" placeholder="نام خانوادگی را وارد کنید...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="label-info">
                                                    <span>کد ملی:</span>
                                                    <input type="number" value="<?php echo $user['national_code'] ?>" name="national_code" class="form-control" placeholder="کد ملی را وارد کنید...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="label-info">
                                                    <span>شماره تلفن همراه:</span>
                                                    <input type="number" value="<?php echo $user['mobile'] ?>" name="mobile" class="form-control" placeholder="شماره تلفن را وارد کنید...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="label-info">
                                                    <span>ایمیل:</span>
                                                    <input type="email" value="<?php echo $user['email'] ?>" name="email" class="form-control" placeholder="ایمیل را وارد کنید...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="label-info">
                                                    <span>جنسیت:</span>
                                                    <select name="gender" class="form-control text-right selectpicker">
                                                        <option value="0">انتخاب کنید....</option>
                                                        <option value="male">آقا</option>
                                                        <option value="female">خانوم</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="profile-section-link">
                                                <button type="submit" class="border-bottom-dt border-0 text-primary">
                                                    <i class="mdi mdi-account-edit-outline"></i>
                                                    ویرایش اطلاعات شخصی
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12">
                            <div class="px-3"></div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12"></div>
                    </div>
                </div>
                <!-- End Content -->

            </div>
        </div>
    </main>
 <!-- End main-content -->
