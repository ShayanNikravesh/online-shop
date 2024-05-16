<?php
if (isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {

    $details_products = getDetailsProducts($_GET['tracking_code']);
    if (!$details_products || (int)$details_products['stock'] === 0 || $details_products['status'] === 'unavailable') {
        setMessage('درخواست نامعتبر', 'محصول مورد نظر قابل نیست یا پیدا نشد.', 'warning');
        back();
    }

    $product = [
        'id' => $details_products['id'],
        'quantity' => 1,
        'price' => $details_products['price'],
        'price_discounted' => $details_products['price_discounted'],
    ];

    $final_amount = !empty($details_products['price_discounted']) ? $details_products['price_discounted'] : $details_products['price'];

    if (!isset($_SESSION['cart_user'])) {
        $_SESSION['cart_user'] = [
            'products' => [],
            'summary' => [
                'total_amount' => 0,
                'amount_payable' => 0,
            ],
        ];
    }

    if (isset($_SESSION['cart_user']['products'][$details_products['id']])) {
//        $_SESSION['cart_user']['products'][$details_products['id']]['quantity'] += 1;
        setMessage('درخواست غیرمجاز', 'محصول از قبل در سبد شما موجود است.', 'warning');
        back();
    } else {
        $_SESSION['cart_user']['products'][$details_products['id']] = $product;

        $_SESSION['cart_user']['summary']['total_amount'] += $details_products['price'];
        $_SESSION['cart_user']['summary']['amount_payable'] += $final_amount;
    }

    setMessage('عملیات موفق', 'محصول به سبد خرید اضافه شد.', 'success');
    back();
}

if (isset($_POST['action']) && $_POST['action'] === 'delete_product_in_cart') {
    if (isset($_SESSION['cart_user']['products'][$_POST['product_id']])) {
        $details_products = $_SESSION['cart_user']['products'][$_POST['product_id']];

        $final_amount = !empty($details_products['price_discounted']) ? $details_products['price_discounted'] : $details_products['price'];

        $_SESSION['cart_user']['summary']['total_amount'] = $_SESSION['cart_user']['summary']['total_amount'] - $details_products['price'] * $details_products['quantity'];
        $_SESSION['cart_user']['summary']['amount_payable'] = $_SESSION['cart_user']['summary']['amount_payable'] - $final_amount * $details_products['quantity'];

        unset($_SESSION['cart_user']['products'][$_POST['product_id']]);
        setMessage('عملیات موفق','محصول از سبد خرید حذف شد', 'success');
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'change_quantity') {
    if (!isset($_SESSION['cart_user']['products'][$_POST['item']])) {
        responseJson([
            'title' => 'درخواست نامعتبر',
            'text' => 'درخواست ارسال شده نا معتبر است.',
            'type' => 'error',
            'status' => 400,
        ]);
    }
    $details_products = getDetailsProductsByID($_POST['item']);
    $product = $_SESSION['cart_user']['products'][$_POST['item']];
    $final_amount = !empty($product['price_discounted']) ? $product['price_discounted'] : $product['price'];

    $_SESSION['cart_user']['summary']['total_amount'] -= $product['price'] * $product['quantity'];
    $_SESSION['cart_user']['summary']['amount_payable'] -= $final_amount * $product['quantity'];


    if ($_POST['event'] === 'increment') {
        if ($details_products['stock'] >= ($_SESSION['cart_user']['products'][$_POST['item']]['quantity'] + 1)) {
            $_SESSION['cart_user']['products'][$_POST['item']]['quantity'] += 1 ;
            $_SESSION['cart_user']['summary']['total_amount'] += $product['price'] * ($product['quantity'] + 1);
            $_SESSION['cart_user']['summary']['amount_payable'] += $final_amount * ($product['quantity'] + 1);

//            dd($_SESSION['cart_user']['summary']);
            responseJson([
                'title' => 'عملیات موفق',
                'text' => 'بروزرسانی با موفقیت انجام شد.',
                'type' => 'success',
                'status' => 200,
            ]);
        }
        responseJson([
            'title' => 'عملیات ناموفق',
            'text' => 'تعداد درخواستی شما بیشتر از موجودی محصول شد.',
            'type' => 'error',
            'status' => 400,
        ]);

    }
    else if ($_POST['event'] === 'decrement' ) {
        if ($_SESSION['cart_user']['products'][$_POST['item']]['quantity'] <= 1) {
            responseJson([
                'title' => 'عملیات ناموفق',
                'text' => 'تعداد کالای درخواستی نمیتواند کمتر از یک عدد باشد.',
                'type' => 'warning',
                'status' => 400,
            ]);
        }
        if ($details_products['stock'] >= ($_SESSION['cart_user']['products'][$_POST['item']]['quantity'] - 1)) {
            $_SESSION['cart_user']['products'][$_POST['item']]['quantity'] -= 1 ;
            $_SESSION['cart_user']['summary']['total_amount'] += $product['price'] * ($product['quantity'] - 1);
            $_SESSION['cart_user']['summary']['amount_payable'] += $final_amount * ($product['quantity'] - 1);
            responseJson([
                'title' => 'عملیات موفق',
                'text' => 'بروزرسانی با موفقیت انجام شد.',
                'type' => 'success',
                'status' => 200,
            ]);
        }
        $_SESSION['cart_user']['products'][$_POST['item']]['quantity'] = $details_products['stock'];

        $_SESSION['cart_user']['summary']['total_amount'] += $product['price'] * ($product['quantity'] - 1);
        $_SESSION['cart_user']['summary']['amount_payable'] += $final_amount * ($product['quantity'] - 1);
        responseJson([
            'title' => 'عملیات موفق',
            'text' => 'بروزرسانی با موفقیت انجام شد.',
            'type' => 'warning',
            'status' => 200,
        ]);
    }

}
