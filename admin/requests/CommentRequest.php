<?php

if (isset($_GET['action']) && $_GET['action'] === 'change_status_comment') {
    // validation => step 1

    // call function model => step 2
    $new_status = $_GET['old_status'] === 'active' ? 'inactive' : 'active';
    $updateComment = updateStatusComment($new_status, $_GET['comment_id']);

    if ($updateComment) {
        setMessage('عملیات موفق', 'وضعیت نظر با موفقیت ویرایش شد.', 'success');
    } else {
        setMessage('عملیات ناموفق', 'خطای داخلی داده است.', 'error');
    }

    back();
    // set message for result operation => step 3
}

if (isset($_POST['delete_comment']) && $_POST['delete_comment'] === 'delete_comment') {

    $delete_comment = ِDeleteComment($_POST['comment_id']);

    if ($delete_comment) {
        setMessage('عملیات موفق','نظر حذف شد.', 'success');
    } else {
        setMessage('عملیات ناموفق','نظر حذف نشد.', 'error');
    }
    back();
}

if (pageName() === 'manage_product_comments') {
    if (!isset($_GET['product_id'])) {
        //setMessage
        redirect('/manage_products.php');
    }
}

