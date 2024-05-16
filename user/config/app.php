<?php
const LOCALIZATION = [
    'rules' => [
        'password' => 'کلمه عبور نباید کمتر از 8 کاراکتر باشد!',
        'mobile' => 'شماره تلفن وارد شده نامعتبر است!',
        'numeric' => 'مقدار فیلد باید فقط عدد باشد!',
        'required' => 'فیلد نباید خالی باشد!',
        'persian_chars' => 'لطفا مقدار فیلد را فارسی بنویسید!',
        'english_chars' => 'لطفا مقدار فیلد را لاتین بنویسید!',
    ],
    'inputs' => [
        'title' => 'عنوان',
        'parent_category' => 'دسته والد',
        'english_title' => 'عنوان لاتین',
        'price' => 'قیمت',
        'stock' => 'موجودی',
        'price_discounted' => 'قیمت با تخفیف',
        'cellphone' => 'شماره تلفن همراه',
        'mobile' => 'شماره تلفن همراه',
        'password' => 'کلمه عبور',
        'password_rule' => 'کلمه عبور',
        'description' => 'توضیحات',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'brand' => 'برند',
        'category' => 'دسته بندی',
        'username' => 'نام کاربری',
        'verify_code' => 'کد تایید',
    ]
];

const PREFIX_TRACKING_CODE = [
    'order' => 'PSO-',
    'product' => 'PSP-',
];

const DOCUMENT_ROOT_DOMAIN = [
    'public' => 'D:\Projects\pascal-store\public',
//    'admin' => 'D:/project_advanced/pascal-store/admin/',
];

const DOMAINS = [
    'main' => 'http://pascal-store.test',
    'public' => 'http://public.pascal-store.test',
    'admin' => 'http://admin.pascal-store.test',
];

const GATEWAY_PAYMENT = [
    'idpay' => [
        'callback' => 'http://pascal-store.test/payment_callback.php',
        'sandbox' => true,
        'api_key' => 'fc57b449-fd71-417a-92a5-8db997da7c8d',
    ],
];
