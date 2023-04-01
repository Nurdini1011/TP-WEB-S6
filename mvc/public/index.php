<?php
define('ROOT', dirname(dirname(__FILE__)));
require_once(ROOT . '/app/config/config.php');
require_once(APPROOT . 'helpers/session_helper.php');
require_once(APPROOT . 'helpers/url_helper.php');
require_once(APPROOT . 'libraries/Controller.php');
require_once(APPROOT . 'libraries/Database.php');
require_once(APPROOT . 'libraries/Core.php');
$init = new Core();
?>
