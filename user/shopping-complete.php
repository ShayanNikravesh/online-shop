<?php
require_once 'views/partial/shopping_header.php';

if ('success') {
    require_once 'views/contents/shopping/shipping_success_content.php';
} else {
    require_once 'views/contents/shopping/shipping_failed_content.php';
}

require_once 'views/partial/shopping_footer.php';