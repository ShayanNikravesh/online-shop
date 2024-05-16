<?php
if (isset($_POST['action']) && $_POST['action'] === 'register_user') {
    $validator = validator([
        'mobile' => 'required|mobile',
    ]);

    if ($validator['status']) {
        $getUserByMobile = getUserByMobile($_POST['mobile']);
        if (!$getUserByMobile) {
            $verify_code = generateRandomNumber(6);
            $token = generateRandomString(50);
            $_SESSION[$token]['auth_register'] = [
                'mobile' => $_POST['mobile'],
                'verify_code' => $verify_code,
                'expire_time' => time() + 180,
                '_back' => '/register.php'
            ];
            //smsSender($_POST['mobile'], $verify_code, null, null, 'authLogin');
            redirect("/verify.php?token=$token");
        }

        setMessage('درخواست غیرمجاز', 'با شماره تلفن وارد شده از قبل حسابی موجود است.', 'warning');
    }

    // set error validation
    setMessage('عملیات ناموفق', 'خطاهای بوجود آمده را برطرف کنید.', 'error');
    back();
}