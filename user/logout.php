<?php
if (isset($_SESSION['user_sing'])) {
    unset($_SESSION['user_sing']);
}

redirect('/');