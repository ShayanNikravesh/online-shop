<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">

        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                <div class="form-ui dt-sl dt-sn pt-4">
                    <div class="section-title title-wide mb-1 no-after-title-wide">
                        <h2 class="font-weight-bold">ورود به دیدیکالا</h2>
                    </div>
                    <?php
                    echo initFormErrors();
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="action" value="login_user">
                        <div class="form-row-title">
                            <h3>شماره موبایل:</h3>
                        </div>
                        <div class="form-row with-icon">
                            <input name="mobile" type="text" class="input-ui pr-2" placeholder="شماره موبایل خود را وارد نمایید">
                            <i class="mdi mdi-account-circle-outline"></i>
                        </div>
                        <div class="form-row mt-3">
                            <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                <i class="mdi mdi-account-circle-outline"></i>
                                ورود در دیدیکالا
                            </button>
                        </div>
                        <div class="form-footer text-right mt-3">
                            <span class="d-block font-weight-bold">قبلا ثبت نام کرده اید؟</span>
                            <a href="#" class="d-inline-block mr-3 mt-2">وارد شوید</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>
<!-- End main-content -->