<?php

function createBrand($title, $english_title) {
    global $cn;
    $sql = "insert into brands (title, english_title) VALUES (?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $title);
    $result->bindValue(2, $english_title);
    return $result->execute();
}

function getBrands() {
    global $cn;
    $sql = "select * from brands";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function updateStatusBrand($status, $brand_id) {
    global $cn;
    $sql = "update brands set status=? where id=?;";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $status);
    $result->bindValue(2, $brand_id);
    return $result->execute();
}

/*
function updateCategory($title, $english_title, $parent_id, $status, $category_id) {
    global $cn;
    if (empty($parent_id)) {
        $parent_id = null;
    }
    $sql = "update categories set parent_id=?, title=?, english_title=?, status=? where id=?;";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $parent_id);
    $result->bindValue(2, $title);
    $result->bindValue(3, $english_title);
    $result->bindValue(4, $status);
    $result->bindValue(5, $category_id);
    return $result->execute();
}

function getParentCategories() {
    global $cn;
    $sql = "select * from categories where parent_id is null";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}



function getCategory($id) {
    global $cn;
    $sql = "select * from categories where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}
*/