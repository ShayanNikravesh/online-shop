<?php
$ignore_pages = [
    'login',
    'test',
    'AuthenticationRequest',
];

if (!isset($_SESSION['admin_sing']) && !in_array(pageName(), $ignore_pages)) {
    redirect('/login.php');
}