<?php
function getProvinces() {
    global $cn;
    $sql = "select * from provinces";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function getCities($province_id) {
    global $cn;
    $sql = "select * from cities where province_id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $province_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function getDefaultAddress($user_id) {
    global $cn;
    $sql = "select addresses.*, CONCAT_WS(' ',addresses.first_name, addresses.last_name) as full_name,
            CONCAT_WS(' - ', p.name, c.name, addresses.address) as full_address
            from addresses 
            join cities c on c.id = addresses.city_id
            join provinces p on p.id = c.province_id
            where user_id=? and is_default='yes'";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $user_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

function createAddress($user_id, $first_name, $last_name, $city ,$mobile ,$post_code ,$address) {
    global $cn;
    $sql = "insert into addresses (first_name, last_name, city_id ,mobile ,post_code ,address, user_id) VALUES (?,?,?,?,?,?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $first_name);
    $result->bindValue(2, $last_name);
    $result->bindValue(3, $city);
    $result->bindValue(4, $mobile);
    $result->bindValue(5, $post_code);
    $result->bindValue(6, $address);
    $result->bindValue(7, $user_id);
    return $result->execute();
}

function getAddresses($user_id) {
    global $cn;
    $sql = "select addresses.*, CONCAT_WS(' ',addresses.first_name, addresses.last_name) as full_name,
            CONCAT_WS(' - ', p.name, c.name, addresses.address) as full_address
            from addresses 
            join cities c on c.id = addresses.city_id
            join provinces p on p.id = c.province_id
            where user_id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $user_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function defaultAddress($id) {
    global $cn;
    $sql = "update addresses set is_default = 'yes' where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    return $result->execute();
}

function defaultAddresses($user_id) {
    global $cn;
    $sql = "UPDATE addresses SET is_default = 'no' where is_default='yes'  and user_id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $user_id);
    return $result->execute();
}

function deleteAddress($id) {
    global $cn;
    $sql = "delete from addresses where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    return $result->execute();
}

