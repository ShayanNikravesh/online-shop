<?php
function getProducts() {
    global $cn;
    $sql = "select * from products";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function getProduct($id) {
    global $cn;
    $sql = "select * from products where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

function updateProduct($title, $english_title, $price, $price_discounted , $status, $description, $review , $product_id) {
    global $cn;
    $sql = "update products set title=?, english_title=?, price=? , price_discounted=?, status=? , description=? , review=? where id=?;";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $title);
    $result->bindValue(2, $english_title);
    $result->bindValue(3,$price );
    $result->bindValue(4,$price_discounted );
    $result->bindValue(5, $status);
    $result->bindValue(6, $description);
    $result->bindValue(7, $review);
    $result->bindValue(8, $product_id);
    return $result->execute();
}

function createProduct($title, $english_title, $price, $price_discounted, $stock, $status, $category, $brand, $description, $review) {
    global $cn;
    $sql = "insert into products (title, english_title, price, price_discounted, stock, status, category_id, brand_id, description, review) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $title);
    $result->bindValue(2, $english_title);
    $result->bindValue(3, $price);
    $result->bindValue(4, $price_discounted);
    $result->bindValue(5, $stock);
    $result->bindValue(6, $status);
    $result->bindValue(7, $category);
    $result->bindValue(8, $brand);
    $result->bindValue(9, $description);
    $result->bindValue(10, $review);
    return $result->execute();
}

//comment
function getComments($product_id) {
    global $cn;
    $sql = "select comments.* ,u.first_name user_first_name , u.last_name user_last_name from comments 
            join users u on u.id = comments.user_id where product_id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $product_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function ِDeleteComment($id) {
    global $cn;
    $sql = "delete from comments where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    return $result->execute();
}

function updateStatusComment($status, $comment_id) {
    global $cn;
    $sql = "update comments set status=? where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $status);
    $result->bindValue(2, $comment_id);
    return $result->execute();
}

function UpdateStatusProducts($status,$id){
    global $cn;
    $sql = "update products set status=? where id=?;";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$status);
    $result->bindValue(2,$id);
    return $result->execute();
}