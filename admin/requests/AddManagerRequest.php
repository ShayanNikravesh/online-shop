<?php

    $validator = validator([
        'first_name' => 'required|persian_chars',
        'last_name' => 'required|persian_chars',
        'mobile' => 'required|mobile',
        'email' => 'required|email',
        'password' => 'required|password',
        'repassword' => 'required|password',
        'gender' => 'required',
        'level' => 'required',
    ]);

    if ($validator['status']) {

        $validemail = getManagerByEmail($_POST['email']);

        if ($validemail){
            responseJson([
                'status' => 400,
                'title' => 'عملیات ناموفق',
                'text' => 'ایمیل تکراری است.',
                'type' => 'error',
            ]);
        }else{
            if ($_POST['password']===$_POST['repassword']){

                $password = password_hash($_POST['password'],PASSWORD_BCRYPT);

                $manager = createManager($_POST['first_name'], $_POST['last_name'],$_POST['mobile'],$_POST['email'],$password,$_POST['gender'],$_POST['level']);

                if ($manager) {
                    responseJson([
                        'status' => 200,
                        'title' => 'عملیات موفق',
                        'text' => 'با موفقیت ثبت شد.',
                        'type' => 'success',
                    ]);
                }
            }
        }

        responseJson([
            'status' => 400,
            'title' => 'عملیات ناموفق',
            'text' => 'اطلاعات وارد شده معتبر نیست.',
            'type' => 'error',
        ]);
    }




