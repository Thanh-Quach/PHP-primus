<?php
if (!isset($main)) {
	include '../const.php';
}

define('_HOST_NAME', $appHost);
define('_DATABASE_NAME', $authdb);
define('_DATABASE_USER_NAME', $usr);
define('_DATABASE_PASSWORD', $pw);

$MySQLiconn = new MySQLi(_HOST_NAME,_DATABASE_USER_NAME,_DATABASE_PASSWORD,_DATABASE_NAME);

?>