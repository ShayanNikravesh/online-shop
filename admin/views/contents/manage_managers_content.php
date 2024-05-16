<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">لیست مدیران</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="font-weight-bold mr-4">در این قسمت لیست مدیران را مشاهده می کنید.</span>
                <!--end::Actions-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->
                <a href="javascript:;" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Today</a>
                <a href="javascript:;" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Month</a>
                <a href="javascript:;" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Year</a>
                <!--end::Actions-->
                <!--begin::Daterange-->

                <!--end::Daterange-->
                <!--begin::Dropdowns-->
                <!--end::Dropdowns-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">مدیریت مدیران</h3>
                </div>
                <?php
                    $managers = getManagers();
                ?>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="datatable_products" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>موبایل</th>
                            <th>ایمیل</th>
                            <th>جنسیت</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($managers) {
                            foreach ($managers as $key => $manager) {
                                ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td><?php echo $manager['first_name'] ?></td>
                                    <td><?php echo $manager['last_name'] ?></td>
                                    <td><?php echo $manager['mobile'] ?></td>
                                    <td><?php echo $manager['email'] ?></td>
                                    <td><?php echo gender($manager['gender']) ?></td>
                                    <td><?php echo status($manager['status']) ?></td>
                                    <td nowrap="nowrap">
                                        <a target="_blank" data-toggle="tooltip" data-placement="top" title="ویرایش محصول" href="/update_products.php?product_id=<?php echo $product['id'] ?>" class="btn btn-primary btn-icon btn-shadow-hover font-weight-bold mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a target="_blank" data-toggle="tooltip" data-placement="top" title="مدیریت تصاویر" href="/manage_profile_photo.php?manager_id=<?php echo $manager['id'] ?>" class="btn btn-dark btn-icon btn-shadow-hover  font-weight-bold mr-2">
                                            <i class="fas fa-images"></i>
                                        </a>
                                        <a href="?action=change_status_manager&manager_id=<?php echo $manager['id'] ?>&old_status=<?php echo $manager['status'] ?>" data-toggle="tooltip" data-placement="bottom" title="تغییر وضعیت" class="btn btn-warning btn-icon btn-shadow-hover font-weight-bold mr-2">
                                            <i class="fa fa-lightbulb"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>