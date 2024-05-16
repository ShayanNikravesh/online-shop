<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">ویرایش حصول</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>


    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">ویرایش محصول</h3>
                </div>
                <?php
                echo initFormErrors();
                ?>
                <form class="form" method="post" action="">
                    <?php
                        $product = getProduct($_GET['product_id']);
                    ?>
                    <input type="hidden" name="action" value="update_product">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>عنوان:</label>
                                <input type="text" value="<?php echo $product['title'] ?>" name="title" class="form-control" placeholder="عنوان محصول را وارد کنید...">
                            </div>
                            <div class="col-lg-6">
                                <label>عنوان انگلیسی:</label>
                                <input type="text" value="<?php echo $product['english_title'] ?>" name="english_title" class="form-control" placeholder="عنوان انگلیسی محصول را وارد کنید...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>قیمت:</label>
                                <input type="number" value="<?php echo $product['price'] ?>" name="price" class="form-control" placeholder="قیمت را وارد کنید...">
                            </div>
                            <div class="col-lg-6">
                                <label>قیمت با تخفیف:</label>
                                <input type="number" value="<?php echo $product['price_discounted'] ?>" name="price_discounted" class="form-control" placeholder="قیمت با نخفیف را وارد کنید...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- get parent categories from database -->
                            <div class="col-lg-6">
                                <label class="text-right">وضعیت:</label>
                                <select name="status" class="form-control text-right selectpicker">
                                    <option value="active">فعال</option>
                                    <option value="inactive">غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label class="text-right">مشخصات و توضیحات:</label>
                                <textarea class="summernote" name="description" style="display: none;"><?php echo $product['description'] ?></textarea>
                            </div>
                            <div class="col-lg-12">
                                <label class="text-right">نقد و بررسی:</label>
                                <textarea class="summernote" name="review" style="display: none;"><?php echo $product['review'] ?></textarea>
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