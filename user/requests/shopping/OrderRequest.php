<?php
if (pageName() === 'profile-order-details') {
    if (isset($_GET['tracking_code'])) {
        $details_orders = getDetailsOrders($_GET['tracking_code']);
        if (!$details_orders) {
            abort();
        }
    } else {
        abort();
    }
}
