<?php
ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);

include 'config/app.php';


include 'helpers/session.php';
include 'helpers/functions.php';

include 'helpers/authentication.php';


include 'database/database_connector.php';


include 'tools/jdf.php';


include 'models/Category.php';
include 'models/Product.php';
include 'models/Photo.php';
include 'models/Manager.php';
include 'models/Brand.php';
include 'models/Banner.php';
include 'models/Article.php';
include 'models/Order.php';


include 'requests/CategoryRequest.php';
include 'requests/ProductRequest.php';
include 'requests/DeleteCommentRequest.php';
include 'requests/BrandRequest.php';
include 'requests/ManagerRequest.php';
include 'requests/ArticleRequest.php';
include 'requests/CommentRequest.php';