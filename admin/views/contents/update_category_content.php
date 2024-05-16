<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">ویرایش دسته بندی</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>


    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">ویرایش دسته</h3>
                </div>
                <?php
                echo initFormErrors();
                ?>
                <form class="form" method="post" action="">
                    <input type="hidden" name="action" value="update_category">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>عنوان:</label>
                                <input type="text" value="<?php echo $category['title'] ?>" name="title" class="form-control" placeholder="عنوان دسته را وارد کنید...">
                            </div>
                            <div class="col-lg-6">
                                <label>عنوان انگلیسی:</label>
                                <input type="text" value="<?php echo $category['english_title'] ?>" name="english_title" class="form-control" placeholder="عنوان انگلیسی دسته را وارد کنید...">
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
                                        foreach ($categories as $category_item) {
                                            ?>
                                            <option <?php echo $category_item['id'] === $category['parent_id'] ? 'selected' : null; ?> value="<?php echo $category_item['id'] ?>"><?php echo $category_item['title'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="text-right">وضعیت:</label>
                                <select name="status" class="form-control text-right selectpicker">
                                    <option value="active">فعال</option>
                                    <option value="inactive">غیرفعال</option>
                                </select>
                            </div>
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