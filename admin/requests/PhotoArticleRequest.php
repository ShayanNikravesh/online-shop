<?php
if (!isset($_FILES['photo_article']) || !isset($_POST['article_id'])) {
    dd('Error...');
}
else {
    $suffix_photo = pathinfo($_FILES['photo_article']['name'], PATHINFO_EXTENSION);
    $photo_name = md5($_FILES['photo_article']['name'] . microtime()) . ".$suffix_photo";
    $src = '/images/articles/';
    $photo = createPhoto($photo_name, $src, $suffix_photo);
    if ($photo) {

        createPhotoArticle($photo, $_POST['article_id']);
        $full_path_image = normalizePath(DOCUMENT_ROOT_DOMAIN['public'], $src, $photo_name);
        if (move_uploaded_file($_FILES['photo_article']['tmp_name'], $full_path_image)) {
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

