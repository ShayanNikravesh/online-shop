<?php
if (pageName() === 'manage_product_photos') {
    if (!isset($_GET['product_id'])) {
        //setMessage
        redirect('/manage_products.php');
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'update_product') {
    // validation => step 1
    $validator = validator([
        'title' => 'persian_chars',
        'english_title' => 'english_chars',
        'price' => 'numeric',
        'price_discounted' => 'numeric',
    ]);

    if ($validator['status']) {
        // call function model => step 2
        $updateProduct = updateProduct($_POST['title'], $_POST['english_title'], $_POST['price'], $_POST['price_discounted'] , $_POST['status'] , $_POST['description'] , $_POST['review'] , $_GET['product_id']);
        if ($updateProduct) {
            setMessage('عملیات موفق', 'اطلاعات ویرایش شد.', 'success');
        } else {
            setMessage('عملیات ناموفق', 'اطلاعات نادرست است.', 'error');
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'create_product') {
    // validation => step 1
    $validator = validator([
        'title' => 'required|persian_chars',
        'english_title' => 'required|english_chars',
        'price' => 'required|numeric',
        'price_discounted' => 'numeric',
        'stock' => 'required',
        'category' => 'required',
        'brand' => 'required',
    ]);

    if ($validator['status']) {
        // call function model => step 2
        $createProduct = createProduct($_POST['title'], $_POST['english_title'], $_POST['price'], $_POST['price_discounted'] , $_POST['stock'] , $_POST['status'] , $_POST['category'] , $_POST['brand'] , $_POST['description'] , $_POST['review']);
        if ($createProduct) {
            setMessage('عملیات موفق', 'محصول مورد نظر با موفقیت ایجاد شد.', 'success');
        } else {
            setMessage('عملیات ناموفق', 'خطای داخلی داده است.', 'error');
        }
    }

    // setMessage('عملیات ناموفق', 'خطاهای بوجود آمده را برطرف کنید.', 'error');
    back();
    // set message for result operation => step 3
}

if (isset($_GET['action']) && ($_GET['action'] === 'active' || $_GET['action'] === 'inactive' || $_GET['action'] === 'unavailable' || $_GET['action'] === 'stop_selling')){
    $status_product = UpdateStatusProducts($_GET['action'], $_GET['id']);
    if ($status_product) {
        setMessage('عملیات موفق', 'وضعیت محصول مورد نظر با موفقیت ویرایش شد.', 'success');
    } else {
        setMessage('عملیات ناموفق', 'خطای داخلی داده است.', 'error');
    }
    back();
}
