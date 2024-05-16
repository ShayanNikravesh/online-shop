<?php
if (isset($_POST['action']) && $_POST['action'] === 'fetch_cities') {
    $cities = getCities($_POST['province']);
    if ($cities) {
        responseJson([
            'data' => $cities
        ]);
    }
    responseJson([
        'data' => []
    ]);
}

if (isset($_POST['action']) && $_POST['action'] === 'create_address') {

    $validator = validator([
        'first_name' => 'persian_chars|required',
        'last_name' => 'persian_chars|required',
        'city' => 'required',
        'mobile' => 'required|mobile',
        'post_code' => 'required|numeric',
        'address' => 'required|persian_chars',
    ]);

    if ($validator['status']) {

        $user_id = $_SESSION['user_sing'];
        $defaultaddresses=defaultAddresses($_SESSION['user_sing']);
        $address = createAddress($user_id ,$_POST['first_name'], $_POST['last_name'] ,$_POST['city'] ,$_POST['mobile'] ,$_POST['post_code'] ,$_POST['address']);
        if ($address) {
            responseJson([
                'status' => 200,
                'title' => 'عملیات موفق',
                'text' => '.آدرس ثبت شد',
                'type' => 'success',
                'addresses' => getAddresses($user_id)
            ]);
        }
        responseJson([
            'status' => 400,
            'title' => 'عملیات نا موفق',
            'text' => 'آدرس ثبت نشد.',
            'type' => 'error',
        ]);
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'update_address') {

    $validator = validator([
        'first_name' => 'persian_chars',
        'last_name' => 'persian_chars',
        'mobile' => 'mobile',
        'post_code' => 'numeric',
        'address' => 'persian_chars',
    ]);

    if ($validator['status']) {


        $updateaddress = updateAddress($_POST['first_name'], $_POST['last_name'] ,$_POST['city'] ,$_POST['mobile'] ,$_POST['post_code'] ,$_POST['address'],$_POST['id']);
        if ($updateaddress) {
            responseJson([
                'status' => 200,
                'title' => 'عملیات موفق',
                'text' => 'آدرس ثبت شد.',
                'type' => 'success',
            ]);
        }
        responseJson([
            'status' => 400,
            'title' => 'عملیات نا موفق',
            'text' => 'آدرس ثبت نشد.',
            'type' => 'error',
        ]);
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'delete_address') {

        $deleteaddress = deleteAddress($_POST['id']);
        if ($deleteaddress) {
            responseJson([
                'status' => 200,
                'title' => 'عملیات موفق',
                'text' => '.آدرس حذف شد',
                'type' => 'success',

            ]);
        }
        responseJson([
            'status' => 400,
            'title' => 'عملیات نا موفق',
            'text' => 'آدرس حذف نشد.',
            'type' => 'error',
        ]);
}

if (isset($_POST['action']) && $_POST['action'] === 'default_address') {
        $addressOld = getDefaultAddress($_SESSION['user_sing']);
        $defaultaddresses=defaultAddresses($_POST['user_id']);
        $defaultaddress = defaultAddress($_POST['id']);
        if ($defaultaddress) {
            responseJson([
                'status' => 200,
                'title' => 'عملیات موفق',
                'text' => '.آدرس انتخاب شد',
                'type' => 'success',
                'idDefault' => $_POST['id'],
                'idDefaultOld' => $addressOld['id'],
            ]);
        }
        responseJson([
            'status' => 400,
            'title' => 'عملیات نا موفق',
            'text' => 'آدرس انتخاب نشد.',
            'type' => 'error',
        ]);
}

