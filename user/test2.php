<?php
/*contents => authentication => register_content.php
partial => [auth_footer.php, auth_header.php]
/register.html ==> /register.php*/

//smsRawSender('09384388401', 'سلام خوش آمدید!');
//dd(smsSender('09384388401', 123456, null, null, 'authLogin'));
//unset($_SESSION['cart_user']);
$params = array(
    'id' => $_GET['id'],
    'order_id' => $_GET['order_id'],
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'X-API-KEY: fc57b449-fd71-417a-92a5-8db997da7c8d',
    'X-SANDBOX: 1',
));
$pusher->trigger('my-channel', 'my-event', [

    'message' => 'hello world'

]);
$result = curl_exec($ch);
curl_close($ch);

dd(json_decode($result, true), $_GET);