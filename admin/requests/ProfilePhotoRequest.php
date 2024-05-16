<?php
if (!isset($_FILES['photo_manager']) || !isset($_POST['manager_id'])) {
    dd('Error...');
}
else {
    $suffix_photo = pathinfo($_FILES['photo_manager']['name'], PATHINFO_EXTENSION);
    $photo_name = md5($_FILES['photo_manager']['name'] . microtime()) . ".$suffix_photo";
    $src = '/images/profiles/';
    $photo = createPhoto($photo_name, $src, $suffix_photo);
    if ($photo) {

        createPhotoManager($photo, $_POST['manager_id']);
        $full_path_image = normalizePath(DOCUMENT_ROOT_DOMAIN['public'], $src, $photo_name);
        if (move_uploaded_file($_FILES['photo_manager']['tmp_name'], $full_path_image)) {
            responseJson([
                'message' => 'عکس باموفقیت ذخیره شد.',
            ]);
        }
        http_response_code(500);
        responseJson([
            'message' => 'ذخیره عکس با خطا مواجه شد.',
        ]);
    }
    http_response_code(500);
    responseJson([
        'message' => 'خطای داخلی داده است.',
    ]);
}


