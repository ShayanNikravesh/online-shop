<?php
function getUserByMobile($mobile) {
    global $cn;
    $sql = "select * from users where mobile=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $mobile);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

function createUser($mobile) {
    global $cn;
    $sql = "insert into users (mobile) values (?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $mobile);
    if (!$result->execute()) {
        return false;
    }
    return $cn->lastInsertId();
}

function getUserById($id) {
    global $cn;
    $sql = "select * from users where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

function updateProfile($first_name, $last_name, $national_code, $mobile, $email, $gender, $id){
    global $cn;
    $sql = "update `users` set first_name=?, last_name=?, national_code=?, mobile=? , email=?, gender=? where id=?;";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $first_name);
    $result->bindValue(2, $last_name);
    $result->bindValue(3, $national_code);
    $result->bindValue(4, $mobile);
    $result->bindValue(5, $email);
    $result->bindValue(6, $gender);
    $result->bindValue(7, $id);
    return $result->execute();
}