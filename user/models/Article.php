<?php

function getArticles() {
    global $cn;
    $sql = "select articles.*, p.src photo_src, p.name photo_name from articles
            left join aritcle_photo on articles.id = aritcle_photo.article_id
            left join photos p on aritcle_photo.photo_id = p.id where status ='active'";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
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



