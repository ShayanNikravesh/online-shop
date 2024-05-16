<?php
function getOrders(){
    global $cn;
    $sql = "select * from orders";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function getDetailsOrders($tracking_code){
    global $cn;
    $sql = "select orders.*, a.first_name receiver_first_name, a.last_name receiver_last_name , a.mobile receiver_mobile , a.postal_code  receiver_postal_code , c.name city_name from orders
            join address_order a on a.order_id = orders.id
            join cities c on a.city_id = c.id 
            where orders.status != 'failed' and orders.tracking_code=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $tracking_code);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}
