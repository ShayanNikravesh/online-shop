<?php
function getCarousel() {
    global $cn;
    $sql = "select banner_photo.*, photos.name, photos.src from banner_photo
            join photos on photos.id = banner_photo.photo_id
            where banner_id=1;";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function getSmallBanner() {
    global $cn;
    $sql = "select banner_photo.*, photos.name, photos.src from banner_photo
            join photos on photos.id = banner_photo.photo_id
            where banner_id=2;";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

function getMedBanner() {
    global $cn;
    $sql = "select banner_photo.*, photos.name, photos.src from banner_photo
            join photos on photos.id = banner_photo.photo_id
            where banner_id=3;";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}


