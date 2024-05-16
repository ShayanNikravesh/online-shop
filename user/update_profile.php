<?php
require_once 'views/partial/header.php';

require_once 'views/partial/navbar.php';

if (isset($_SESSION['user_sing'])) {
    require_once 'views/contents/profile/update_profile_content.php';
} else {
    require_once 'views/contents/profile/profile_empty_content.php';
}

require_once 'views/partial/footer.php';