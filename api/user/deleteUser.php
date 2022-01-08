<?php
	include '../const.php';
	require_once('../vendor/autoload.php');
	include '../validate.php';
	include '../database/Appdatabase.php';
	
	if ($token->data->role === 'admin' || $token->data->role === 'operator') {
		$MySQLiconn->query("DELETE FROM `".$_POST['database_access']."` WHERE uuid ='".$_POST['uuid']."'");
		$MySQLiconn->query("DELETE FROM `bill_payment` WHERE student_uid ='".$_POST['uuid']."'");

		$res = '200 OK';
		echo json_encode($res);
	}
?>