<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">ایجاد دسته بندی</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">افزودن دسته</h3>
                </div>
                <?php
                echo initFormErrors();
                ?>
                <form class="form" method="post" action="">
                    <input type="hidden" name="action" value="create_category">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>عنوان:</label>
                                <input type="text" name="title" class="form-control" placeholder="عنوان دسته را وارد کنید...">
                            </div>
                            <div class="col-lg-6">
                                <label>عنوان انگلیسی:</label>
                                <input type="text" name="english_title" class="form-control" placeholder="عنوان انگلیسی دسته را وارد کنید...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- get parent categories from database -->
                            <?php
                            $categories = getParentCategories();
                            ?>
                            <div class="col-lg-6">
                                <label class="text-right">دسته والد:</label>
                                <select name="parent" class="form-control text-right selectpicker">
                                    <option value="0">انتخاب کنید....</option>
                                    <?php
                                    if ($categories) {
                                        foreach ($categories as $category) {
                                            ?>
                                            <option value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success mr-2">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>