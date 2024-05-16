<?php
$pages = [
    'login',
    'test',
    'AuthenticationRequest',
];

if (!isset($_SESSION['user_sing']) && in_array(pageName(), $pages)) {
    redirect('/login.php');
}