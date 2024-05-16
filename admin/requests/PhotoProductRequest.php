<?php
if (!isset($_FILES['photo_product']) || !isset($_POST['product_id'])) {
    dd('Error...');
}
else {
    $suffix_photo = pathinfo($_FILES['photo_product']['name'], PATHINFO_EXTENSION);
    $photo_name = md5($_FILES['photo_product']['name'] . microtime()) . ".$suffix_photo";
    $src = '/images/products/';
    $photo = createPhoto($photo_name, $src, $suffix_photo);
    if ($photo) {
        $sort = 1;
        $latestPhotoProduct = getLatestPhotoProduct($_POST['product_id']);

        if ($latestPhotoProduct) {
            $sort = $latestPhotoProduct['sort'] + 1;
        }

        createPhotoProduct($photo, $_POST['product_id'], $sort);
        $full_path_image = normalizePath(DOCUMENT_ROOT_DOMAIN['public'], $src, $photo_name);
        if (move_uploaded_file($_FILES['photo_product']['tmp_name'], $full_path_image)) {
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

