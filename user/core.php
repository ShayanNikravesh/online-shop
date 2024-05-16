<?php
ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);

include 'config/app.php';


include 'helpers/session.php';
include 'helpers/functions.php';


include 'database/database_connector.php';

include 'tools/kavenegar/vendor/autoload.php';
include 'tools/sms-service.php';
include 'tools/gateway-payment/idpay.php';
include 'tools/jdf.php';


include 'models/Category.php';
include 'models/Product.php';
include 'models/Photo.php';
include 'models/User.php';
include 'models/Address.php';
include 'models/Order.php';
include 'models/Payment.php';
include 'models/Banner.php';
include 'models/Article.php';
include 'models/Brand.php';
include 'models/Comment.php';


include 'requests/authentication/RegisterRequest.php';
include 'requests/authentication/LoginRequest.php';
include 'requests/authentication/VerifyRequest.php';
include 'requests/product/SingleProductRequest.php';
include 'requests/cart/CartRequest.php';
include 'requests/shopping/ShippingRequest.php';
include 'requests/shopping/PaymentRequest.php';
include 'requests/shopping/OrderRequest.php';
include 'requests/user/UserRequest.php';
//include 'requests/ProductRequest.php';