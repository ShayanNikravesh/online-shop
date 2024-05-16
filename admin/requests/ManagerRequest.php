<?php
if (isset($_POST['action']) && $_POST['action'] === 'update_manager') {
    // validation => step 1
    $validator = validator([
        'first_name' => 'persian_chars',
        'last_name' => 'persian_chars',
        'mobile' => 'mobile',
    ]);

    if ($validator['status']) {
        // call function model => step 2
        $updateManager = updateManager($_POST['first_name'], $_POST['last_name'], $_POST['mobile'] ,$_SESSION['admin_sing']);
        if ($updateManager) {
            setMessage('عملیات موفق', 'اطلاعات ویرایش شد.', 'success');
        } else {
            setMessage('عملیات ناموفق', 'اطلاعات نادرست است.', 'error');
        }
    }

    //setMessage('عملیات ناموفق', 'خطاهای بوجود آمده را برطرف کنید.', 'error');
    back();
    // set message for result operation => step 3
}

if (isset($_GET['action']) && $_GET['action'] === 'change_status_manager') {
    // validation => step 1

    // call function model => step 2
    $new_status = $_GET['old_status'] === 'active' ? 'inactive' : 'active';
    $updateManager = updateStatusManager($new_status, $_GET['manager_id']);

    if ($updateManager) {
        setMessage('عملیات موفق', 'وضعیت مدیر با موفقیت ویرایش شد.', 'success');
    } else {
        setMessage('عملیات ناموفق', 'خطای داخلی داده است.', 'error');
    }

    back();
    // set message for result operation => step 3
}

