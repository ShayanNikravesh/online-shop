<?php
function getBanners(){
    global $cn;
    $sql = "select * from banners";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function createPhotoBanner($photo_id, $banner_id) {
    global $cn;
    $sql = "insert into banner_photo (photo_id, banner_id) VALUES (?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $photo_id);
    $result->bindValue(2, $banner_id);
    return $result->execute();
}

function getBannerPhotos($banner_id) {
    global $cn;
    $sql = "select banner_photo.*, photos.name, photos.src from banner_photo
            join photos on photos.id = banner_photo.photo_id
            where banner_id=?;";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $banner_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}




