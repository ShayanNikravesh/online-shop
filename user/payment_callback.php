<?php
if (!authUser()) {
    // set message
    redirect('/login.php');
}

if (!cartUser() || count(cartUser()['products']) === 0) {
    // set message
    redirect('/');
}

if (isset($_GET['order_id']) && isset($_GET['status']) && isset($_GET['id']) && isset($_GET['track_id'])) {
    if (isset($_SESSION['user_order']) && $_GET['order_id'] === $_SESSION['user_order']['tracking_code']) {

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

            $cart_product = $_SESSION['cart_user']['products'][$cart_product['id']]; // get new change product info

            $final_amount =  !empty($cart_product['price_discounted']) ? $cart_product['price_discounted'] : $cart_product['price'];
            $total_amount += ((float)$cart_product['price'] * (int)$cart_product['quantity']);
            $amount_payable += ((float)$final_amount * (int)$cart_product['quantity']);
        }

        $_SESSION['cart_user']['summary']['total_amount'] = $total_amount;
        $_SESSION['cart_user']['summary']['amount_payable'] = $amount_payable;
        if (!empty($errors)) {
            $_SESSION['cart_user']['notification'] = $errors;
            redirect('/cart.php');
        }
        $order_status = 'failed';
        $payment_status = 'failed';

        $order = createOrder(authUser(), $_GET['order_id'], $total_amount, $amount_payable, $order_status);
        if ($order) {
            $payment = createPayment($order, $_GET['id'], $_GET['track_id'], null, $amount_payable, $_GET['status']);
            // save order receiver address
            $DefaultAddress = getDefaultAddress(authUser());
            $order_receiver_address = createAddressOrder($order, authUser() ,$DefaultAddress['first_name'],$DefaultAddress['last_name'],$DefaultAddress['mobile'],$DefaultAddress['post_code'],$DefaultAddress['city_id'],$DefaultAddress['address']);
        }

        if (empty($order) || empty($payment)) {
            // sat message
            redirect('/');
        }

        foreach (cartUser()['products'] as $product) {
            createOrderProduct($order, $product['id'], $product['price'], $product['price_discounted'], $product['quantity']);
        }

        if ((int)$_GET['status'] == 10) {
            $result = decrementProductStockAndCreateOrderProduct(cartUser()['products'], $_GET['order_id']);
            if ($result) {
                $order_status = 'success';
                $payment_status = 'success';

                $payment_track_id = $result['payment']['track_id'] ?? null;
                updateStatusPayment($payment, $payment_track_id, $payment_status);
                updateStatusOrder($order, $order_status);

                // send SMS Customer
                // send SMS CEO
                unset($_SESSION['cart_user']);
            }
        }

        redirect('shopping-complete.php?tracking_code=' . $_GET['order_id']);
    }
}

