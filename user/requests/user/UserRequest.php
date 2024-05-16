<?php
if (isset($_POST['action']) && $_POST['action'] === 'update_profile') {
    // validation => step 1
    $validator = validator([
        'first_name' => 'persian_chars',
        'last_name' => 'persian_chars',
        'national_code' => 'numeric',
        'mobile' => 'mobile',
    ]);

    if ($validator['status']) {
        // call function model => step 2
        $updateProfile = updateProfile($_POST['first_name'], $_POST['last_name'], $_POST['national_code'], $_POST['mobile'], $_POST['email'], $_POST['gender'], $_SESSION['user_sing']);
        if ($updateProfile) {
            setMessage('عملیات موفق', 'اطلاعات ویرایش شد.', 'success');
        } else {
            setMessage('عملیات ناموفق', 'اطلاعات نادرست است.', 'error');
        }
    }

    //setMessage('عملیات ناموفق', 'خطاهای بوجود آمده را برطرف کنید.', 'error');
    back();
    // set message for result operation => step 3
}
