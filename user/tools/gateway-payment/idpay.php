<?php
function createGatewayTransaction($order_id, $amount) {
    $params = array(
        'order_id' => $order_id,
        'amount' => $amount * 10,
        'name' => null,
        'phone' => null,
        'mail' => null,
        'desc' => null,
        'callback' => GATEWAY_PAYMENT['idpay']['callback'],
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'X-API-KEY: ' . GATEWAY_PAYMENT['idpay']['api_key'],
        'X-SANDBOX: ' . GATEWAY_PAYMENT['idpay']['sandbox']
    ));

    $result = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($result, true);
    if (!isset($result['link'])) {
        return false;
    }

    return $result;
}

function verifyTransaction($order_id, $id) {
    $params = [
        'id' => $id,
        'order_id' => $order_id,
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'X-API-KEY: ' . GATEWAY_PAYMENT['idpay']['api_key'],
        'X-SANDBOX: ' . GATEWAY_PAYMENT['idpay']['sandbox']
    ));

    $result = curl_exec($ch);
    curl_close($ch);
    $result_payment = json_decode($result, true);
    if (!isset($result_payment['error_code'])) {
        return $result_payment;
    }
    // save error
    return false;
}