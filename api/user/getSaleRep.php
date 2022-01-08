<?php
	include '../const.php';

	require_once('../vendor/autoload.php');
	include '../validate.php';
	include '../database/Appdatabase.php';

	if ($token->data->role === 'admin' || $token->data->role === 'user') {
		if (isset($_POST['uid'])) {
			$Data = [];
			$res = $MySQLiconn->query("SELECT * FROM `sale_rep` WHERE `uid` ='".$_POST['uid']."'");
			while ($row = $res->fetch_assoc()) {
				array_push($Data,$row);
			}
			echo json_encode($Data);
		}else{
			$Data = [];
			$res = $MySQLiconn->query("SELECT * FROM `sale_rep`");
			while ($row = $res->fetch_assoc()) {
				array_push($Data,$row);
			}
			echo json_encode($Data);
		}

	}


?>