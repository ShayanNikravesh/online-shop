<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">ویرایش اطلاعات</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>


    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">ویرایش اطلاعات</h3>
                </div>
                <?php
                echo initFormErrors();
                ?>
                <form class="form" method="post" action="">
                    <input type="hidden" name="action" value="update_manager">
                    <?php
                    $manager = getManager($_SESSION['admin_sing']);
                    ?>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>نام:</label>
                                <input type="text" value="<?php echo $manager['first_name'] ?>" name="first_name" class="form-control" placeholder="نام را وارد کنید...">
                            </div>
                            <div class="col-lg-6">
                                <label>نام خانوادگی:</label>
                                <input type="text" value="<?php echo $manager['last_name'] ?>" name="last_name" class="form-control" placeholder="نام خانوادگی را وارد کنید...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- get parent categories from database -->
                            <div class="col-lg-6">
                                <label class="text-right">موبایل:</label>
                                <input type="number" value="<?php echo $manager['mobile'] ?>" name="mobile" class="form-control" placeholder="موبایل را وارد کنید...">
                            </div>
                            <div class="col-lg-6"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success mr-2">ویرایش</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>