<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">مدیرت مقالات</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">در این بخش می توانید مقالات سایت را مدیریت کنید.</span>
                <!--end::Actions-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->

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
                    <h3 class="card-title">مدیریت مقالات</h3>
                </div>
                <?php
                    $articles = getArticles();
                ?>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="datatable_products" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام نویسنده</th>
                            <th>عنوان</th>
                            <th>عنوان انگلیسی</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($articles) {
                            foreach ($articles as $key => $article) {
                                ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td><?php echo $article['full_name'] ?></td>
                                    <td><?php echo $article['title'] ?></td>
                                    <td><?php echo $article['english_title'] ?></td>
                                    <td><?php echo status($article['status']) ?></td>
                                    <td nowrap="nowrap">
                                        <a target="_blank" data-toggle="tooltip" data-placement="top" title="ویرایش مقاله" href="/update_article.php?article_id=<?php echo $article['id'] ?>" class="btn btn-primary btn-icon btn-shadow-hover font-weight-bold mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a target="_blank" data-toggle="tooltip" data-placement="top" title="مدیریت تصویر" href="/manage_article_photos.php?article_id=<?php echo $article['id'] ?>" class="btn btn-dark btn-icon btn-shadow-hover  font-weight-bold mr-2">
                                            <i class="fas fa-images"></i>
                                        </a>
                                        <a data-toggle="tooltip" data-placement="top" title="تغییر وضعیت" href="?action=change_status_article&article_id=<?php echo $article['id'] ?>&old_status=<?php echo $article['status'] ?>" class="btn btn-info btn-icon btn-shadow-hover font-weight-bold mr-2">
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