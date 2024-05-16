<?php
function createComment($user_id, $product_id, $comment) {
    global $cn;
    $sql = "insert into comments (user_id, product_id, comment) VALUES (?,?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $user_id);
    $result->bindValue(2, $product_id);
    $result->bindValue(3, $comment);
    return $result->execute();
}

function getComments($product_id) {
    global $cn;
    $sql = "select comments.* ,u.first_name user_first_name , u.last_name user_last_name from comments 
            join users u on u.id = comments.user_id where product_id=? AND comments.status='active' ";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $product_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function getUserComments($user_id){
    global $cn;
    $sql = "select comments.* ,p.title product_title , p.tracking_code product_tracking_code from comments 
            join products p on p.id = comments.product_id where user_id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $user_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function deleteComment($comment_id){
    global $cn;
    $sql = "delete from comments where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $comment_id);
    return $result->execute();
}