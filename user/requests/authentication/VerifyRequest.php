<?php
if (pageName() === 'verify') {
    if (!isset($_GET['token']) || !isset($_SESSION[$_GET['token']])) {
        redirect();
    }

    $auth_details = $_SESSION[$_GET['token']]['auth_login'] ?? $_SESSION[$_GET['token']]['auth_register'];
}

if (isset($_POST['action']) && $_POST['action'] === 'confirmation_mobile_with_otp') {
    $validator = validator([
        'verify_code' => 'required|numeric',
    ]);

    if ($validator['status']) {
        $auth_details = $_SESSION[$_GET['token']]['auth_login'] ?? $_SESSION[$_GET['token']]['auth_register'];

        if ((int)$auth_details['verify_code'] === (int)$_POST['verify_code']) {

            if (isset($_SESSION[$_GET['token']]['auth_login'])) {
                $_SESSION['user_sing'] = $auth_details['id'];
                unset($_SESSION[$_GET['token']]);
                redirect();
            } elseif (isset($_SESSION[$_GET['token']]['auth_register'])) {
                $createUser = createUser($auth_details['mobile']);
                if ($createUser) {

                    $_SESSION['user_sing'] = $createUser;
                    unset($_SESSION[$_GET['token']]);
                    redirect();
                } else {
                    setMessage('عملیات ناموفق', 'خطای سیستمی رخ داده است.', 'error');
                    back();
                }
            }
        }

        setMessage('درخواست غیرمجاز', 'کد وارد شده نامعتبر است.', 'error');
    }

    // set error validation
    setMessage('عملیات ناموفق', 'خطاهای بوجود آمده را برطرف کنید.', 'error');
    back();
}