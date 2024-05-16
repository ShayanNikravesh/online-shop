<?php
if (isset($_POST['action']) && $_POST['action'] === 'create_brand') {
    // validation => step 1
    $validator = validator([
        'title' => 'required|persian_chars',
        'english_title' => 'required|english_chars',
    ]);

    if ($validator['status']) {
        // call function model => step 2
        $create_brand = createBrand($_POST['title'], $_POST['english_title']);
        if ($create_brand) {
            setMessage('عملیات موفق', 'برند مورد نظر با موفقیت ایجاد شد.', 'success');
        } else {
            setMessage('عملیات ناموفق', 'خطای داخلی داده است.', 'error');
        }
    }

   // setMessage('عملیات ناموفق', 'خطاهای بوجود آمده را برطرف کنید.', 'error');
    back();
    // set message for result operation => step 3
}

if (isset($_GET['action']) && $_GET['action'] === 'change_status_brand') {
    // validation => step 1

    // call function model => step 2
    $new_status = $_GET['old_status'] === 'active' ? 'inactive' : 'active';
    $updateBrand = updateStatusBrand($new_status, $_GET['brand_id']);

    if ($updateBrand) {
        setMessage('عملیات موفق', 'وضعیت برند مورد نظر با موفقیت ویرایش شد.', 'success');
    } else {
        setMessage('عملیات ناموفق', 'خطای داخلی داده است.', 'error');
    }

    back();
    // set message for result operation => step 3
}

/*
if (isset($_POST['action']) && $_POST['action'] === 'update_category') {
    // validation => step 1
    $validator = validator([
        'title' => 'required|persian_chars',
        'english_title' => 'required|english_chars',
        'parent' => 'numeric',
    ]);

    if ($validator['status']) {
        // call function model => step 2
        $updateCategory = updateCategory($_POST['title'], $_POST['english_title'], $_POST['parent'], $_POST['status'], $_GET['category_id']);
        if ($updateCategory) {
            setMessage('عملیات موفق', 'دسته مورد نظر با موفقیت ویرایش شد.', 'success');
        } else {
            setMessage('عملیات ناموفق', 'خطای داخلی داده است.', 'error');
        }
    }

    //setMessage('عملیات ناموفق', 'خطاهای بوجود آمده را برطرف کنید.', 'error');
    back();
    // set message for result operation => step 3
}

if (pageName() === 'update_category') {
    $category = getCategory($_GET['category_id']);
}
*/