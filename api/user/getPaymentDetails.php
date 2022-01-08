<?php
	include '../const.php';

	require_once('../vendor/autoload.php');
	include '../validate.php';
	include '../database/Appdatabase.php';

	if ($token->data->role === 'admin' || $token->data->role === 'user') {
		$Data = [];
		if (!isset($_POST['action'])) {
			$col = '`student_uid`';
		}else if ($_POST['action'] == 'edit'){
			$col = '`uuid`';
		};
		$res = $MySQLiconn->query("SELECT * FROM `bill_payment` WHERE ".$col." ='".$_POST['uuid']."'");
		while ($row = $res->fetch_assoc()) {
			array_push($Data,$row);
		}

		echo json_encode(['Success', $Data]);
	}

?>