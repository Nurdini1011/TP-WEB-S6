<?php
// routeur 
// defini le constant - pas besoin de $
define('ROOT', str_replace('index.php', ''.$_SERVER['SCRIPT_FILENAME']));
require_once(ROOT . 'app/Model.php');
require_once(ROOT . 'app/Controller.php');
?>