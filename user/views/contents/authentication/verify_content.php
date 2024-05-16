<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                <div class="form-ui dt-sl dt-sn pt-4">
                    <div class="section-title title-wide mb-1 no-after-title-wide">
                        <h2 class="font-weight-bold">تایید شماره</h2>
                    </div>
                    <div class="message-light">
                        برای شماره همراه <?php echo $auth_details['mobile'] ?> کد تایید ارسال گردید
                        <a href="<?php echo $auth_details['_back'] ?>" class="btn-link-border">
                            ویرایش شماره
                        </a>
                    </div>
                    <?php
                    echo initFormErrors();
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="action" value="confirmation_mobile_with_otp">
                        <div class="form-row-title">
                            <h3>کد تایید را وارد کنید</h3>
                        </div>
                        <div class="form-row">
                            <input name="verify_code" type="text" class="input-ui pr-2" placeholder="کد تایید ارسال شده را وارد کنید...">
                        </div>
                        <div class="form-row mt-3">
                            <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                <i class="mdi mdi-account-circle-outline"></i>
                                تایید کد
                            </button>
                        </div>
                        <div class="form-footer text-right mt-3">
                            <span class="d-block font-weight-bold">شماره تلفن اشتباه است؟</span>
                            <a href="<?php echo $auth_details['_back'] ?>" class="d-inline-block mr-3 mt-2">ویرایش شماره</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>
<!-- End main-content -->