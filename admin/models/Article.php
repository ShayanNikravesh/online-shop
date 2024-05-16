<?php

function createArticle($first_name, $last_name, $title, $english_title, $article) {
    global $cn;
    $sql = "insert into articles (first_name, last_name, title, english_title, article) VALUES (?,?,?,?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $first_name);
    $result->bindValue(2, $last_name);
    $result->bindValue(3, $title);
    $result->bindValue(4, $english_title);
    $result->bindValue(5, $article);
    return $result->execute();
}

function updateArticle($first_name, $last_name, $title, $english_title, $article, $article_id) {
    global $cn;
    $sql = "update articles set first_name=?, last_name=?, title=?, english_title=?, article=? where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $first_name);
    $result->bindValue(2, $last_name);
    $result->bindValue(3, $title);
    $result->bindValue(4, $english_title);
    $result->bindValue(5, $article);
    $result->bindValue(6, $article_id);
    return $result->execute();
}

function getArticles() {
    global $cn;
    $sql = "select * ,concat_ws(' ', first_name,last_name) as full_name from articles";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function updateStatusArticle($status, $article_id) {
    global $cn;
    $sql = "update articles set status=? where id=?;";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $status);
    $result->bindValue(2, $article_id);
    return $result->execute();
}

function getArticlePhotos($article_id) {
    global $cn;
    $sql = "select aritcle_photo.*, photos.name, photos.src from aritcle_photo
            join photos on photos.id = aritcle_photo.photo_id
            where article_id=?;";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $article_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function createPhotoArticle($photo_id, $article_id) {
    global $cn;
    $sql = "insert into aritcle_photo (photo_id, article_id) VALUES (?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $photo_id);
    $result->bindValue(2, $article_id);
    return $result->execute();
}

function getArticle($id) {
    global $cn;
    $sql = "select articles.*, p.src photo_src, p.name photo_name from articles
            left join aritcle_photo on articles.id = aritcle_photo.article_id
            left join photos p on aritcle_photo.photo_id = p.id where articles.id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

