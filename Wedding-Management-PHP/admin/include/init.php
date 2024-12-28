<?php
ob_start();
date_default_timezone_set('Asia/Manila');
$webroot = "D:xampp/htdocs/";
define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', $webroot.DS.'wedding-management-php'.DS.'admin');
define('INCLUDES_PATH', SITE_ROOT.DS.'include');
require_once(__DIR__ . '/../include/Helper.php');
require_once(__DIR__ . '/../include/config.php');
require_once(__DIR__ . '/../include/database.php');
require_once(__DIR__ . '/../include/db_object.php');
require_once(__DIR__ . '/../include/Session.php');
require_once(__DIR__ . '/../include/Accounts.php');
require_once(__DIR__ . '/../include/Account_Details.php');
require_once(__DIR__ . '/../include/Booking.php');
require_once(__DIR__ . '/../include/Guest.php');
require_once(__DIR__ . '/../include/Categories.php');
require_once(__DIR__ . '/../include/Features.php');
require_once(__DIR__ . '/../include/EventWedding.php');
require_once(__DIR__ . '/../include/Gallery.php');
require_once(__DIR__ . '/../include/Users.php');
require_once(__DIR__ . '/../include/Events.php');
require_once(__DIR__ . '/../include/Liquidation.php');


?>