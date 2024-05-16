<?php
function createOrder($user_id, $tracking_code, $total_amount, $amount_payable, $status)
{
    global $cn;
    $sql = "insert into orders (user_id, tracking_code, total_amount, amount_payable, status) values (?,?,?,?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $user_id);
    $result->bindValue(2, $tracking_code);
    $result->bindValue(3, $total_amount);
    $result->bindValue(4, $amount_payable);
    $result->bindValue(5, $status);
    if ($result->execute()) {
        return $cn->lastInsertId();
    }
    return false;
}

function getOrders($user_id){
    global $cn;
    $sql = "select * from orders where user_id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $user_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function getLatestOrders($user_id){
    global $cn;
    $sql = "select * from orders where user_id=? group by created_at order by created_at DESC limit 2";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $user_id);
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

function createAddressOrder($order_id, $user_id, $first_name, $last_name ,$mobile, $postal_code,$city_id,$address)
{
    global $cn;
    $sql = "insert into address_order (order_id, user_id, first_name, last_name, mobile,postal_code,city_id,address) values (?,?,?,?,?,?,?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $order_id);
    $result->bindValue(2, $user_id);
    $result->bindValue(3, $first_name);
    $result->bindValue(4, $last_name);
    $result->bindValue(5, $mobile);
    $result->bindValue(6, $postal_code);
    $result->bindValue(7, $city_id);
    $result->bindValue(8, $address);
    if ($result->execute()) {
        return $cn->lastInsertId();
    }
    return false;
}

function updateStatusOrder($order_id, $status)
{
    global $cn;
    $sql = "update orders set status = ? where id=?;";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $status);
    $result->bindValue(2, $order_id);
    $result->execute();
    return $result->rowCount() > 0;
}

function createOrderProduct($order_id, $product_id, $price, $price_discounted, $quantity)
{
    global $cn;
    $sql = "insert into order_product (order_id, product_id, price, price_discounted, quantity) VALUES (?,?,?,?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $order_id);
    $result->bindValue(2, $product_id);
    $result->bindValue(3, $price);
    $result->bindValue(4, $price_discounted);
    $result->bindValue(5, $quantity);
    return $result->execute();
}

function decrementProductStockAndCreateOrderProduct(array $products, $order_tracking_code)
{
    global $cn;
    $cn->beginTransaction();
    try {
        foreach ($products as $product) {
            updateProductStock($product['id'], $product['quantity']);
        }
        $verifyTransaction = verifyTransaction($order_tracking_code, $_GET['id']);
        if ($verifyTransaction && ((int)$verifyTransaction['status'] === 100 || (int)$verifyTransaction['status'] === 101)) {
            $cn->commit();
            return $verifyTransaction;
        }
        $cn->rollBack();
        return false;
    } catch (Throwable $exception) {
        // save error log
        $cn->rollBack();
        return false;
    }
}

function getOrderTrackingcode(){

}