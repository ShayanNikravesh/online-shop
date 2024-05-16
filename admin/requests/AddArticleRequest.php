<?php

    $validator = validator([
        'first_name' => 'required|persian_chars',
        'last_name' => 'required|persian_chars',
        'title' => 'required|persian_chars',
        'english_title' => 'required|english_chars',
    ]);

    if ($validator['status']) {

        $article = createArticle($_POST['first_name'], $_POST['last_name'],$_POST['title'],$_POST['english_title'],$_POST['article']);

        if ($article){
            responseJson([
                'status' => 200,
                'title' => 'عملیات موفق',
                'text' => 'مقاله با موفقیت ثبت شد.',
                'type' => 'success',
            ]);
        }
        responseJson([
            'status' => 400,
            'title' => 'عملیات ناموفق',
            'text' => 'اطلاعات وارد شده معتبر نیست.',
            'type' => 'error',
        ]);
    }




