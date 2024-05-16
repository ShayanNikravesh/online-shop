<?php
if (isset($_POST['action']) && $_POST['action'] === 'create_comment') {

    $validator = validator([
        'comment' => 'persian_chars|required',
    ]);

    if ($validator['status']){

        $user_id = $_SESSION['user_sing'];
        $comment = createComment($user_id , $_POST['product_id'], $_POST['comment']);

        if ($comment) {
            responseJson([
                'status' => 200,
                'title' => 'عملیات موفق',
                'text' => '.نظر ثبت شد',
                'type' => 'success',
            ]);
        }
        responseJson([
            'status' => 400,
            'title' => 'عملیات ناموفق',
            'text' => 'لطفا اطلاعات را به درستی وارد کنید.',
            'type' => 'error',
        ]);
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'delete_comment') {

         $comment = deleteComment($_POST['id']);
        if ($comment) {
            responseJson([
                'status' => 200,
                'title' => 'عملیات موفق',
                'text' => '.نظر حذف شد',
                'type' => 'success',
            ]);
        }
        responseJson([
            'status' => 400,
            'title' => 'عملیات ناموفق',
            'text' => 'نظر حذف نشد.',
            'type' => 'error',
        ]);
}

