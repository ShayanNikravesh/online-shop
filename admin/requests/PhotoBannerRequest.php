<?php
if (!isset($_FILES['photo_banner']) || !isset($_POST['banner_id'])) {
    dd('Error...');
}
else {
    $suffix_photo = pathinfo($_FILES['photo_banner']['name'], PATHINFO_EXTENSION);
    $photo_name = md5($_FILES['photo_banner']['name'] . microtime()) . ".$suffix_photo";
    $src = '/images/banners/';
    $photo = createPhoto($photo_name, $src, $suffix_photo);
    if ($photo) {

        createPhotoBanner($photo, $_POST['banner_id']);
        $full_path_image = normalizePath(DOCUMENT_ROOT_DOMAIN['public'], $src, $photo_name);
        if (move_uploaded_file($_FILES['photo_banner']['tmp_name'], $full_path_image)) {
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
