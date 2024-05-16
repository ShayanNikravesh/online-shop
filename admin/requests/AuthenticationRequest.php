<?php

if (isset($_POST['action']) && $_POST['action'] === 'manager_login') {
    $validator = validator([
        'email' => 'required',
        'password' => 'required|password',
    ]);

    if ($validator['status']) {
        $doLogin = doLogin($_POST['email'], $_POST['password']);
        if ($doLogin) {
            $_SESSION['admin_sing'] = $doLogin['id'];

            responseJson([
                'status' => 200,
                'title' => 'عملیات موفق',
                'text' => 'با موفقیت وارد شدید.',
                'type' => 'success',
            ]);
        }
        responseJson([
            'status' => 400,
            'title' => 'عملیات نا موفق',
            'text' => 'اطلاعات وارد شده معتبر نیست.',
            'type' => 'error',
        ]);
    }
}


