<?php
	include '../const.php';
	require_once('../vendor/autoload.php');
	include '../validate.php';
	include '../database/Appdatabase.php';
	
	if ($token->data->role === 'admin' || $token->data->role === 'operator') {
		$MySQLiconn->query("DELETE FROM `sale_rep` WHERE `uid` ='".$_POST['uid']."'");

		$res = '200 OK';
		echo json_encode($res);
	}
?>