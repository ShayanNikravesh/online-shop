<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">مدیریت تصویر</h5>
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">در این بخش میتوانید تصویر پروفایل خود را مدیریت کنید.</span>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">آپلود تصویر</h3>
                </div>
                <div class="card-body">
                    <input id="input_manager_id" type="hidden" value="<?php echo $_GET['manager_id'] ?>">
                    <div class="dropzone dropzone-default dropzone-success" id="upload_photo_manager">
                        <div class="dropzone-msg dz-message needsclick">
                            <h3 class="dropzone-msg-title">برای آپلود فایل یا به اینجا بکشید یا کلیک کنید.</h3>
                            <span class="dropzone-msg-desc">حجم تصویر حداکثر باید 1 مگابایت باشد</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">مدیریت تصاویر</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $manager_photo = getManagerPhoto($_GET['manager_id']);
                        if ($manager_photo) {
                            foreach ($manager_photo as $photo) {
                                ?>
                                <div class="col-lg-2 text-center" id="photo<?php echo $photo['photo_id'] ?>">
                                    <div class="image-input image-input-outline">
                                        <div class="image-input-wrapper" style="background-image: url(<?php echo normalizePath('http://public.pascal-store.test', $photo['src'], $photo['name']) ?>)"></div>
                                        <button type="button" onclick="DeletePhoto(<?php echo $photo['photo_id'] ?>)" class="btn btn-hover-icon-danger" data-toggle="tooltip" data-placement="bottom" ><i class="fa fa-trash"></i></button>
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
</div>
