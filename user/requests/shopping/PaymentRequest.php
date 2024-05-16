<?php
if (pageName() === 'shopping-payment') {
    if (!authUser()) {
        // set message
        redirect('/login.php');
    }

    if (!cartUser() || count(cartUser()['products']) === 0) {
        // set message
        redirect('/');
    }

    $defaultAddress = getDefaultAddress(authUser());
    if (!$defaultAddress) {
        redirect('shipping.php');
    }

    $_SESSION['user_order']['default_address'] = $defaultAddress['id'];
}


if (isset($_POST['action']) && $_POST['action'] === 'to_gateway_payment') {
    if (!authUser()) {
        // set message
        redirect('/login.php');
    }

    if (!cartUser() || count(cartUser()['products']) === 0) {
        // set message
        redirect('/');
    }

    $defaultAddress = getDefaultAddress(authUser());
    if (!$defaultAddress) {
        redirect('shipping.php');
    }

    if (!isset($_SESSION['user_order']['default_address'])) {
        redirect('shipping.php');
    }

    $cart_products = cartUser()['products'];

    $errors = [];
    $total_amount = 0;
    $amount_payable = 0;

    foreach ($cart_products as $cart_product) {
        $details_product = getDetailsProductsByID($cart_product["id"]);

        if ($details_product['status'] === 'inactive') {
            unset($_SESSION['cart_user']['products'][$cart_product["id"]]);
            continue;
        } elseif ($details_product['status'] === 'stop_selling') {
            $errors[] = [
                'title' => 'حذف محصول از سبد خرید',
                'message' => "محصول \"{$details_product['title']}\" به دلیل توقف فروش از سبد شما حذف شد.",
                'icon' => 'danger',
            ];

            unset($_SESSION['cart_user']['products'][$cart_product["id"]]);
            continue;
        }

        if ($details_product['status'] === 'unavialable' || (int)$details_product['stock'] === 0) {
            $errors[] = [
                'title' => 'تغییر موجودی محصول در سبد خرید',
                'message' => "محصول \"{$details_product['title']}\" به دلیل اتمام موجودی از سبد شما حذف شد.",
                'icon' => 'danger',
            ];
            unset($_SESSION['cart_user']['products'][$cart_product["id"]]);
            continue;
        } elseif ((int)$details_product['stock'] < $cart_product['quantity']) {
            $errors[] = [
                'title' => 'تغییر موجودی محصول در سبد خرید',
                'message' => "تعداد درخواست شما از محصول \"{$details_product['title']}\" به دلیل تغییر موجودی در انبار در سبد شما بروز شد.",
                'icon' => 'warning',
            ];

            $_SESSION['cart_user']['products'][$cart_product['id']]['quantity'] = (int)$details_product['stock'];
        }

        if ((float)$details_product['price'] !== (float)$cart_product['price']) {
            $errors[] = [
                'title' => 'تغییر قیمت محصول در سبد خرید',
                'message' => "قیمت محصول  در سبد شما تغییر کرد.",
                'icon' => 'warning',
            ];

            $_SESSION['cart_user']['products'][$cart_product['id']]['price'] = (float)$details_product['price'];
        }

        if ((float)$details_product['price_discounted'] !== (float)$cart_product['price_discounted']) {
            $errors[] = [
                'title' => 'تغییر قیمت محصول در سبد خرید',
                'message' => "قیمت با تخفیف محصول  در سبد شما تغییر کرد.",
                'icon' => 'warning',
            ];

            $_SESSION['cart_user']['products'][$cart_product['id']]['price_discounted'] = (float)$details_product['price_discounted'];
        }

        $cart_product = $_SESSION['cart_user']['products'][$cart_product['id']]; // get new change product info

        $final_amount =  !empty($cart_product['price_discounted']) ? $cart_product['price_discounted'] : $cart_product['price'];
        $total_amount += ((float)$cart_product['price'] * (int)$cart_product['quantity']);
        $amount_payable += ((float)$final_amount * (int)$cart_product['quantity']);
    }

    $_SESSION['cart_user']['summary']['total_amount'] = $total_amount;
    $_SESSION['cart_user']['summary']['amount_payable'] = $amount_payable;

    if (empty($errors)) {
        $order_tracking_code = PREFIX_TRACKING_CODE['order'] . generateRandomNumber();
        $_SESSION['user_order']['tracking_code'] = $order_tracking_code;
        $transaction = createGatewayTransaction($order_tracking_code, $amount_payable);
        if ($transaction) {
            redirect($transaction['link']);
        } else {
            setMessage('خطا در پرداخت', 'امکان پرداخت در حال حاضر وجود ندارد.', 'error');
        }
    }
}