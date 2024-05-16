<?php
if (pageName() === 'manage_order_details') {
    if (isset($_GET['tracking_code'])) {
        $details_orders = getDetailsOrders($_GET['tracking_code']);
        if (!$details_orders) {
            abort();
        }
    } else {
        abort();
    }
}
