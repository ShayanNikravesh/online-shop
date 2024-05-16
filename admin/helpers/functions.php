<?php
function dark()
{
    echo <<<HTML
        <style>
        body {
            background-color: #1e1e2d;
        }
        .xdebug-var-dump {
            color: #fff;
        }
        .xdebug-var-dump small {
            color: #fff;
        }
        .xdebug-var-dump i {
            color: #0abb87;
        }
        .xdebug-var-dump b {
            color: #fd397a;
        }
        .xdebug-var-dump font,  font[color="#cc0000"],  font[color="#888a85"] {
            color: #ffb822;
        }
        .xdebug-var-dump font[color="#4e9a06"] {
            color: #5d78ff;
        }
        </style>
        HTML;
}

function dd(...$data) {
    dark();
    var_dump(...$data);
    exit();
}

function pageName() {
    $filter_1 = ltrim($_SERVER['SCRIPT_NAME'], '/');
    return rtrim(basename($filter_1), '.php');
}

function redirect($url = '/') {
    header("Location: $url");
    exit();
}

function back($url = '/') {
    redirect($_SERVER['HTTP_REFERER'] ?? $url);
}

function normalizePath(...$paths)
{
    $normalizedPaths = array_map(function ($path) {
        return trim($path, '/');
    }, $paths);

    return implode('/', $normalizedPaths);
}

function generateRandomNumber($length = 10)
{
    try {
        /*$intMin = (10 ** $length) / 10;
        $intMax = (10 ** $length) - 1;

        return random_int($intMin, $intMax);*/
        $min = '1' . str_repeat('0', $length - 1);
        $max = str_repeat('9', $length);
        return random_int((int)$min, (int)$max);
    } catch (Throwable $exception) {
        return 0;
    }
}

function validator(array $fields)
{
    $errors = [];
    foreach ($fields as $input => $field) {
        $rules = explode('|', $field);
        $validatorByRules = validatorByRules($rules, $input);
        if (!empty($validatorByRules)) {
            $errors[$input] = $validatorByRules;
        }
    }

    if (!empty($errors)) {
        if (isAjaxRequest()) {
            responseJson([
                'status' => 401,
                'title' => 'خطاهای بوجود آمده را برطرف کنید.',
                'messages' => initFormErrors($errors),
            ]);
        }
        $_SESSION['form_errors'][pageName()] = [
            'errors' => $errors,
            'title' => 'لطفا خطا های زیر را برطرف کنید:',
        ];
        return ['status' => false];
    }
    return ['status' => true];
}

function validatorByRules(array $rules, $input)
{
    $errors = [];
    foreach ($rules as $rule) {
        if ($rule === 'required') {
            if (!isset($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
            continue;
        }
        if ($rule === 'numeric') {
            if (isset($_REQUEST[$input]) && !is_numeric($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
        }
        if ($rule === 'mobile') {
            if (isset($_REQUEST[$input]) && !validateMobile($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
        }
        /*if ($rule === 'email') {
            if (isset($_REQUEST[$input]) && !validateMobile($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
        }*/
        if ($rule === 'password') {
            if (isset($_REQUEST[$input]) && !validateLenPass($input)) {
                $errors[] = ['rule' => $rule];
            }
        }
        if ($rule === 'persian_chars') {
            if (isset($_REQUEST[$input]) && !validatePersianChars($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
        }
        if ($rule === 'english_chars') {
            if (isset($_REQUEST[$input]) && !validateEnglishChars($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
        }
    }
    return $errors;
}

function translate($word, $is_rule = false)
{
    $attributes = [
        'rules' => LOCALIZATION['rules'],
        'inputs' => LOCALIZATION['inputs'],
    ];
    if ($is_rule) {
        return $attributes['rules'][$word] ?? $word;
    }
    return $attributes['inputs'][$word] ?? $word;
}

function initFormErrors($errors = null)
{
    $html_last = null;
    $errors = $_SESSION['form_errors'][pageName()]['errors'] ?? $errors;
    $title_error = $_SESSION['form_errors'][pageName()]['title'] ?? null;
    if ($errors) {
        foreach ($errors as $input => $error) {
            $input_label = translate($input);
            $html_first = null;
            foreach ($error as $value) {
                $rule_label = translate($value['rule'], true);
                $html_first .= "<li style='margin: 5px 10px;list-style: decimal;' class='alert-text'>{$rule_label}</li>";
            }
            $html_last .= "<li style='margin: 5px 10px;list-style: decimal;' class='alert-text'>
                <span class='bold fof-15'>{$input_label}:</span>
                <ul style='padding: 0 10px;display: unset;font-size: 13px;'>
                    $html_first
                </ul>
            </li>";
        }
        $title_error = (empty($title_error)) ? 'لطفا خطا های زیر را برطرف کنید!' : $title_error;
        unset($_SESSION['form_errors'][pageName()]);
        return "<ul style='padding: 0 10px;display: block;text-align: right;' class='alert alert-danger alert-bold'>
                    <p class='bold fof-17 mt-3'>" . $title_error . "</p>
                    <hr>
                    $html_last
                </ul>";
    }
    return null;
}

function validatePersianChars($data)
{
    if (!preg_match("/^([0-9\-\_ پچجحخهعغفقثصضشسیبلاتنمکگوئدذرزطظژآ])+$/u", $data)) {
        return false;
    }
    return true;
}

function validateEnglishChars($data)
{
    if (empty(trim($data))) {
        return false;
    }
    if (preg_match("/[^A-Za-z0-9\-\_\/ ]/", $data)) {
        return false;
    }
    return $data;
}

function validateMobile($data)
{
    if (empty(trim($data))) {
        return false;
    }
    if (!preg_match("/^09\d{9}$/", $data)) {
        return false;
    }
    return $data;
}

function validateLenPass($data)
{
    if (strlen($_REQUEST[$data]) < 6) {
        return false;
    }
    return $data;
}

function responseJson(array $data)
{
    echo json_encode($data);
    exit();
//    exit(json_encode($data));
}

function isAjaxRequest(): bool
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

function setMessage($title, $text, $type) {
    $_SESSION['message'] = [
        'title' => $title,
        'text' => $text,
        'type' => $type,
    ];
}

function status($status) {
    switch ($status) {
        case 'active':
            return 'فعال';
        case 'inactive':
            return 'غیرفعال';
        case 'unavailable':
            return 'ناموجود';
        case 'stop_selling':
            return 'توقف فروش';
        case 'success':
            return 'موفق';
        case 'failed':
            return 'نا موفق';
        default:
            return 'نامشخص';
    }
}

function gender($gender) {
    switch ($gender) {
        case 'male':
            return 'آقا';
        case 'female':
            return 'خانم';
    }
}

function created_at($value){
    $dateG = $value;
    $explode1=explode(' ',$dateG);
    $explode2=explode('-',$explode1['0']);
    $dateJ=gregorian_to_jalali($explode2['0'],$explode2['1'],$explode2['2'],'/');
    return $dateJ;
}

function orderUrl($tracking_code) {
    return normalizePath(DOMAINS['main'], "/manage_order_details.php?tracking_code=$tracking_code");
}

function priceFormatter($price) {
    return number_format($price) . ' تومان';
}