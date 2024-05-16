<?php
function doLogin($email, $password)
{
    global $cn;
    $sql = "select * from managers where email=? and status='active' limit 1";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $email);
    $result->execute();
    if ($result->rowCount() > 0) {
        $admin = $result->fetch();
        if (password_verify($password, $admin['password'])) {
            return $admin;
        }
        return false;
    }
    return false;
}

function getManager($id) {
    global $cn;
    $sql = "select * from managers where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

function updateManager($first_name, $last_name, $mobile, $id) {
    global $cn;
    $sql = "update managers set first_name=?, last_name=? , mobile=? where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $first_name);
    $result->bindValue(2, $last_name);
    $result->bindValue(3, $mobile);
    $result->bindValue(4, $id);
    return $result->execute();
}

function getManagers() {
    global $cn;
    $sql = "select * from managers";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function getManagerByEmail($email) {
    global $cn;
    $sql = "select * from managers where email=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $email);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function updateStatusManager($status, $manager_id) {
    global $cn;
    $sql = "update managers set status=? where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $status);
    $result->bindValue(2, $manager_id);
    return $result->execute();
}

function createManager($first_name, $last_name, $mobile, $email, $password, $gender, $level) {
    global $cn;
    $sql = "insert into managers (first_name, last_name, mobile, email, password, gender, level) VALUES (?,?,?,?,?,?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $first_name);
    $result->bindValue(2, $last_name);
    $result->bindValue(3, $mobile);
    $result->bindValue(4, $email);
    $result->bindValue(5, $password);
    $result->bindValue(6, $gender);
    $result->bindValue(7, $level);
    return $result->execute();
}

function createPhotoManager($photo_id, $manager_id) {
    global $cn;
    $sql = "insert into manager_photo (photo_id, manager_id) VALUES (?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $photo_id);
    $result->bindValue(2, $manager_id);
    return $result->execute();
}

function getManagerPhoto($manager_id) {
    global $cn;
    $sql = "select manager_photo.*, photos.name, photos.src from manager_photo
            join photos on photos.id = manager_photo.photo_id
            where manager_id=?;";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $manager_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function deleteProfilePhoto($id){
    global $cn;
    $sql = "delete from photos where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    return $result->execute();
}
