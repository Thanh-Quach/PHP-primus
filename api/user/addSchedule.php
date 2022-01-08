<?php
	include '../const.php';

	require_once('../vendor/autoload.php');
	include '../validate.php';
	include '../database/Appdatabase.php';

	if ($token->data->role === 'admin' || $token->data->role === 'user') {

		$uid = $MySQLiconn->real_escape_string($_POST['uuid']);
		$schedule = $_POST['schedule'];
		$MySQLiconn->query("UPDATE `".$_POST['database_access']."` SET `schedules` = '".$schedule."' WHERE `".$_POST['database_access']."`.`uuid` = '".$uid."'");


		$res = 'Success';
		echo json_encode([$res,$uid]);
	}
?>