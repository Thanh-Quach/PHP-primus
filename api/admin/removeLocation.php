<?php
	include '../const.php';
	require_once('../vendor/autoload.php');
	include '../validate.php';
	include '../database/Appdatabase.php';
	
	if ($token->data->role === 'admin') {
		$MySQLiconn->query("DELETE FROM locations WHERE uid='".$_POST['uid']."'");
		$MySQLiconn->query("DROP TABLE `".$_POST['uid']."_".$_POST['name']."`");

		$res = '200 OK';
		echo json_encode($res);
	}

	include './removeOperator.php'
?>