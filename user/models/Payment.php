<?php
function createPayment($order_id, $pay_key, $track_id, $payment_track_id, $amount_payable, $gateway_status)
{
    global $cn;
    $sql = "insert into payments (order_id, pay_key, track_id, payment_track_id, amount_payable, gateway_status) values (?,?,?,?,?,?);";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $order_id);
    $result->bindValue(2, $pay_key);
    $result->bindValue(3, $track_id);
    $result->bindValue(4, $payment_track_id);
    $result->bindValue(5, $amount_payable);
    $result->bindValue(6, $gateway_status);
    if ($result->execute()) {
        return $cn->lastInsertId();
    }
    return false;
}

function updateStatusPayment($id, $payment_track_id, $status)
{
    global $cn;
    $sql = "update payments set status = ?, payment_track_id = ? where id =?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $status);
    $result->bindValue(2, $payment_track_id);
    $result->bindValue(3, $id);
    $result->execute();
    return $result->rowCount() > 0;
}