<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">ایجاد مدیر</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">افزودن مدیر</h3>
                </div>
                <form class="form needs-validation" id="form_insert_manager" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>نام:</label>
                                <input type="text" name="first_name" class="form-control" placeholder="نام را وارد کنید..." required pattern="[پچجحخهعغفقثصضشسیبلاتنمکگوئدذرزطظژآ]+" >
                            </div>
                            <div class="col-lg-6">
                                <label>نام خانوادگی:</label>
                                <input type="text" name="last_name" class="form-control" placeholder="نام خانوادگی را وارد کنید..." required pattern="[ پچجحخهعغفقثصضشسیبلاتنمکگوئدذرزطظژآ]+" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>موبایل:</label>
                                <input type="tel" name="mobile" class="form-control" placeholder="09..." required pattern="[0-9]+" data-v-min-length="11" data-v-max-length="11">
                            </div>
                            <!-- get parent categories from database -->
                            <div class="col-lg-6">
                                <label class="text-right">ایمیل:</label>
                                <input type="email" name="email" class="form-control" placeholder="ایمیل را وارد کنید..." required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>رمز:</label>
                                <input type="password" name="password" class="form-control" placeholder="رمز را وارد کنید." minlength="6" id="password" title="password" required >
                            </div>
                            <div class="col-lg-6">
                                <label class="text-right">تکرار رمز:</label>
                                <input type="password" name="repassword" class="form-control" placeholder=" تکرار رمز را وارد کنید..." data-v-equal="#password" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label class="text-right">جنسیت:</label>
                                <select name="gender" class="form-control form-select text-right" required>
                                    <option value>انتخاب کنید...</option>
                                    <option value="1">آقا</option>
                                    <option value="2">خانم</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="text-right">سمت:</label>
                                <select name="level" class="form-control text-right" required>
                                    <option value>انتخاب کنید...</option>
                                    <option value="1">مدیر</option>
                                    <option value="2">اپراتور</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" onclick="AddManager()" class="btn btn-success mr-2">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
