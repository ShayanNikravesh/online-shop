<?php
if (pageName() === 'single-product') {
    if (isset($_GET['tracking_code'])) {
        $details_products = getDetailsProducts($_GET['tracking_code']);
        if (!$details_products) {
            abort();
        }
    } else {
        abort();
    }
}

if (pageName() === 'category-products') {
    if (isset($_GET['category_id'])) {
        $getCategoryProducts = getCategoryProducts($_GET['category_id']);
        if (!$getCategoryProducts) {
            abort();
        }
    } else {
        abort();
    }
}

