<?php

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

function getCategories($parent_id) {
    global $cn;
    $sql = "select * from categories where parent_id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $parent_id);
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

function getallCategories() {
    global $cn;
    $sql = "select * from categories";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}
