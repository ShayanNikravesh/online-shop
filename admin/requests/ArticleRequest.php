<?php

if (isset($_GET['action']) && $_GET['action'] === 'change_status_article') {

    $new_status = $_GET['old_status'] === 'active' ? 'inactive' : 'active';
    $updateArticle = updateStatusArticle($new_status, $_GET['article_id']);

    if ($updateArticle) {
        setMessage('عملیات موفق', 'وضعیت مقاله مورد نظر با موفقیت ویرایش شد.', 'success');
    } else {
        setMessage('عملیات ناموفق', 'خطای داخلی داده است.', 'error');
    }

    back();
    // set message for result operation => step 3
}

if (isset($_POST['action']) && $_POST['action'] === 'update_article') {

    $validator = validator([
        'first_name' => 'required|persian_chars',
        'last_name' => 'required|persian_chars',
        'title' => 'required|persian_chars',
        'english_title' => 'required|english_chars',
    ]);

    if ($validator['status']) {

        $article = updateArticle($_POST['first_name'], $_POST['last_name'],$_POST['title'],$_POST['english_title'],$_POST['article'],$_GET['article_id']);

        if ($article) {
            setMessage('عملیات موفق', 'مقاله با موفقیت ایجاد شد.', 'success');
        } else {
            setMessage('عملیات ناموفق', 'خطای داخلی داده است.', 'error');
        }

    }
}

