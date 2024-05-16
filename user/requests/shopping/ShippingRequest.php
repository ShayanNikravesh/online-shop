<?php
if (pageName() === 'shipping') {
    if (!authUser()) {
        // set message
        redirect('/login.php');
    }

    if (!cartUser() || count(cartUser()['products']) === 0) {
        // set message
        redirect('/');
    }

    $defaultAddress = getDefaultAddress(authUser());

    if (isset($_POST['action']) && $_POST['action'] === 'to_payment_step') {
        if ($defaultAddress) {
            $_SESSION['user_order']['default_address'] = $defaultAddress['id'];
            redirect('shopping-payment.php');
        }
        // set message
    }
}
