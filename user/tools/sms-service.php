<?php

use Kavenegar\Exceptions\ApiException;
use Kavenegar\KavenegarApi;

function smsRawSender($receptor, $message): bool
{
    try {
        $api = new KavenegarApi('33787451796470687659724D2F6B4D61574E514653655A6D56496F566856754F4B4D635349594A64586F6B3D');
        $sender = '1000596446';
        $api->Send($sender, $receptor, $message);
        return true;
    } catch (ApiException | \Kavenegar\Exceptions\HttpException $e) {
//        dd($e);
        return false;
    }
}

function smsSender($phone, $value, $value2, $value3, string $template)
{
    try {
        $api = new KavenegarApi('33787451796470687659724D2F6B4D61574E514653655A6D56496F566856754F4B4D635349594A64586F6B3D');
        $receptor = $phone;
        $token = $value;
        $token2 = $value2;
        $token3 = $value3;
        $template_sender = $template;
        $type = "sms";
        $result = $api->VerifyLookup($receptor, $token, $token2, $token3, $template_sender, $type);
        return ['status' => 200, 'ResponseText' => $result];
    }
    catch (ApiException $e) {
        dd($e);
        return ['status' => 5, 'ResponseText' => $e->errorMessage()];
    } catch (\Kavenegar\Exceptions\HttpException $e) {
        dd($e);
        return ['status' => 7, 'ResponseText' => $e->errorMessage()];
    }
}