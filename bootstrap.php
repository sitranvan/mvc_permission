<?php
// Handle http, https root
define('_DIR_ROOT', str_replace('\\', '/', __DIR__));
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$web_root = $protocol . $_SERVER['HTTP_HOST'];
$folder = str_replace($_SERVER['DOCUMENT_ROOT'], '', _DIR_ROOT);
$web_root .= $folder;
define('_WEB_ROOT', $web_root);

/**
 * Load file
 */
require_once 'helpers/function.php';
require_once 'configs/constans.php';
require_once 'configs/routes.php';
require_once 'configs/database.php';
require_once 'configs/middlewares.php';

require_once 'app/libraries/phpmailer/Exception.php';
require_once 'app/libraries/phpmailer/PHPMailer.php';
require_once 'app/libraries/phpmailer/SMTP.php';

require_once 'app/App.php';
require_once 'core/Session.php';
require_once 'core/Cookie.php';
require_once 'core/Request.php';
require_once 'core/Response.php';
require_once 'core/Route.php';
require_once 'core/Connection.php';
require_once 'core/Database.php';
require_once 'core/Model.php';
require_once 'core/View.php';
require_once 'core/Controller.php';
require_once 'core/Load.php';
require_once 'app/classes/Utils.php';
require_once 'app/classes/Validate.php';
require_once 'app/classes/UserLogin.php';
require_once 'app/classes/MyMailer.php';
require_once 'app/middlewares/AuthMiddleware.php';
require_once 'app/middlewares/ProviderMiddleware.php';
require_once 'app/middlewares/PermissionMiddleware.php';
