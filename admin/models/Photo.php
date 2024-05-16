<?php
function createPhoto($name, $src, $suffix) {
    global $cn;
    $sql = "insert into photos (name, src, suffix) VALUES (?,?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $name);
    $result->bindValue(2, $src);
    $result->bindValue(3, $suffix);
    if ($result->execute()) {
        return $cn->lastInsertId();
    }
    return false;
}

function getPhoto($id) {
    global $cn;
    $sql = "select * from photos where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

function createPhotoProduct($photo_id, $product_id, $sort) {
    global $cn;
    $sql = "insert into photo_product (photo_id, product_id, sort) VALUES (?,?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $photo_id);
    $result->bindValue(2, $product_id);
    $result->bindValue(3, $sort);
    return $result->execute();
}

function getLatestPhotoProduct($product_id) {
    global $cn;
    $sql = "select * from photo_product where product_id=? order by sort DESC limit 1";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $product_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

function getProductPhotos($product_id) {
    global $cn;
    $sql = "select photo_product.*, photos.name, photos.src from photo_product
            join photos on photos.id = photo_product.photo_id
            where product_id=?;";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $product_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function deletePhoto($id){
    global $cn;
    $sql = "delete from photos where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    return $result->execute();
}
