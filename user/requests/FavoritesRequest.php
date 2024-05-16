<?php
if (isset($_POST['action']) && $_POST['action'] === 'toggle_favorite') {

    if (authUser()){
        try {
            $user_id = $_SESSION['user_sing'];
            if (($_POST['has_favorite']=="true")) {
                deleteFavorite($user_id,$_POST['product_id']);
                responseJson([
                    'status' => 200,
                    'title' => 'عملیات موفق',
                    'text' => '.محصول از مورد علاقه ها حذف شد',
                    'type' => 'success',
                    'class' => 'success',
                ]);
            }else{
                addFavorites($user_id,$_POST['product_id']);
                responseJson([
                    'status' => 200,
                    'title' => 'عملیات موفق',
                    'text' => '.محصول به مورد علاقه ها اضافه شد',
                    'type' => 'success',
                    'class' => 'success',
                ]);
            }
        } catch (Exception $exception) {
            responseJson([
                'status' => 400,
                'title' => 'عملیات ناموفق',
                'text' => '.عملیات انجام نشد',
                'type' => 'error'
            ]);
        }
    }else{
        responseJson([
            'status' => 400,
            'title' => 'عملیات ناموفق',
            'text' => '.ابتدا وارد حساب خود شوید',
            'type' => 'error'
        ]);
    }

}
