<?php

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

