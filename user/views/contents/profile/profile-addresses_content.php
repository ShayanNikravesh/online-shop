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
                                        <a href="javascript:;" class="active">
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
                            <h2>آدرس ها</h2>
                        </div>
                        <div class="dt-sl">
                            <?php
                                $user_id = $_SESSION['user_sing'];
                                $addresses = getAddresses($user_id);
                            ?>
                            <div class="row js--address-container">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-horizontal-address text-center px-4">
                                        <button class="checkout-address-location" data-toggle="modal"
                                                data-target="#modal-location">
                                            <strong>ایجاد آدرس جدید</strong>
                                            <i class="mdi mdi-map-marker-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php
                                    if($addresses){
                                        foreach ($addresses as $address){
                                ?>
                                 <div class="col-lg-6 col-md-12" id="address<?= $address['id'] ?>">
                                    <div class="card-horizontal-address js--card-address">
                                        <div class="card-horizontal-address-desc">
                                            <h4 class="card-horizontal-address-full-name"><?php echo $address['full_name']?></h4>
                                            <p>
                                                <?php echo $address['full_address']?>
                                            </p>
                                        </div>
                                        <div class="card-horizontal-address-data">
                                            <ul class="card-horizontal-address-methods float-right">
                                                <li class="card-horizontal-address-method">
                                                    <i class="mdi mdi-email-outline"></i>
                                            کدپستی : <span><?php echo $address['post_code']?></span>
                                                </li>
                                                <li class="card-horizontal-address-method">
                                                    <i class="mdi mdi-cellphone-iphone"></i>
                                            تلفن همراه : <span><?php echo $address['mobile']?></span>
                                                </li>
                                            </ul>
                                            <div class="card-horizontal-address-actions">
                                                <!--<button class="btn-note update-address" >ویرایش</button>-->
                                                <button type="button" class="btn-note"  onclick="deleteAddress(<?php echo $address['id']?>);">حذف</button>
                                                <?php
                                                    if ($address['is_default']=== 'yes')
                                                    {
                                                ?>
                                                        <label class="mr-2 border p-1 bg-dark text-light rounded">آدرس پیش فرض</label>
                                                <?php
                                                    }else{
                                                ?>
                                                        <button type="button" class="btn btn-note" onclick="defaultAddress(<?php echo $address['id']?> , <?php echo $_SESSION['user_sing'] ?>);" >آدرس پیش فرض</button>
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

<!-- Start Modal location new -->
<div class="modal fade" id="modal-location" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    <i class="now-ui-icons location_pin"></i>
                    افزودن آدرس جدید
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-ui dt-sl">
                            <form class="form-account" id="form_add_address" action="">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>نام</h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pr-2 text-right" name="first_name" type="text" placeholder="نام خود را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>نام خانوادگی</h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pr-2 text-right" name="last_name" type="text" placeholder="نام خود را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>استان:</h4>
                                        </div>
                                        <div class="form-row">
                                            <?php
                                            $provinces = getProvinces();
                                            if ($provinces) {
                                                ?>
                                                <div class="custom-select-ui">
                                                    <select class="right" name="province">
                                                        <option value="0" data-display="استان را انتخاب کنید">استان را انتخاب کنید</option>
                                                        <?php
                                                        foreach ($provinces as $province) {
                                                            ?>
                                                            <option value="<?php echo $province['id'] ?>"><?php echo $province['name'] ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <?php
                                            }
                                            ?>
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
                                                <select class="right" name="city">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>شماره موبایل</h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pl-2 dir-ltr text-left" name="mobile" type="text" placeholder="09xxxxxxxxx">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>کدپستی</h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pl-2 dir-ltr text-left" name="post_code" type="number" placeholder="کدپستی خود را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>آدرس پستی</h4>
                                        </div>
                                        <div class="form-row">
                                            <textarea class="input-ui pr-2 text-right" name="address" type="text" placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 pr-4 pl-4">
                                        <button type="submit" class="btn btn-sm btn-primary btn-submit-form">ثبت و ارسال به این آدرس</button>
                                        <button type="button" class="btn-link-border float-left mt-2">انصراف و بازگشت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal location new -->

<!-- Start Modal location edit -->
<div class="modal fade" id="modal-location-edit" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    <i class="now-ui-icons location_pin"></i>
                    ویرایش آدرس
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-ui dt-sl">
                            <form class="form-account" id="form_update_address" action="">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>نام</h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pr-2 text-right" name="first_name" type="text" placeholder="نام خود را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>نام خانوادگی</h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pr-2 text-right" name="last_name" type="text" placeholder="نام خود را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>استان:</h4>
                                        </div>
                                        <div class="form-row">
                                            <?php
                                            $provinces = getProvinces();
                                            if ($provinces) {
                                                ?>
                                                <div class="custom-select-ui">
                                                    <select class="right" name="province">
                                                        <option value="0" data-display="استان را انتخاب کنید">استان را انتخاب کنید</option>
                                                        <?php
                                                        foreach ($provinces as $province) {
                                                            ?>
                                                            <option value="<?php echo $province['id'] ?>"><?php echo $province['name'] ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <?php
                                            }
                                            ?>
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
                                                <select class="right" name="city">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>شماره موبایل</h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pl-2 dir-ltr text-left" name="mobile" type="text" placeholder="09xxxxxxxxx">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>کدپستی</h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pl-2 dir-ltr text-left" name="post_code" type="number" placeholder="کدپستی خود را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                آدرس پستی
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <textarea class="input-ui pr-2 text-right" name="address" type="text" placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 pr-4 pl-4">
                                        <button type="submit" class="btn btn-sm btn-primary btn-submit-form">ثبت و ارسال به این آدرس</button>
                                        <button type="button" class="btn-link-border float-left mt-2">انصراف و بازگشت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal location edit -->

<!-- Start Modal remove-location -->
<div class="modal fade" id="remove-location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-3" id="exampleModalLabel">آیا مطمئنید که این آدرس حذف شود؟</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="remodal-general-alert-button remodal-general-alert-button--cancel" data-dismiss="modal">خیر</button>
                <button type="submit" onclick="deleteAddress();" class="remodal-general-alert-button remodal-general-alert-button--approve">بله</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal remove-location -->
