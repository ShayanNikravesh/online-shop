<?php
if (isset($_POST['action']) && $_POST['action'] === 'delete_photo') {

    $photo = getPhoto($_POST['photo_id']);
    $full_path_image = normalizePath(DOCUMENT_ROOT_DOMAIN['public'], $photo['src'], $photo['name']);
    if (unlink($full_path_image)) {
        deletePhoto($_POST['photo_id']);
        responseJson([
            'status' => 200,
            'title' => 'عملیات موفق',
            'text' => 'عکس با موفقیت حذف شد.',
            'type' => 'success',
            ]);
    } else {
        responseJson([
            'status' => 400,
            'title' => 'عملیات ناموفق',
            'text' => 'عکس حذف نشد.',
            'type' => 'error',
            ]);
    }
    back();
}


