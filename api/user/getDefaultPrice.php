<?php
	include '../const.php';

	require_once('../vendor/autoload.php');
	include '../validate.php';
	include '../database/Appdatabase.php';

	if ($token->data->role === 'admin' || $token->data->role === 'user') {
		$Data = [];

		$res = $MySQLiconn->query("SELECT * FROM `default_price`");
		while ($row = $res->fetch_assoc()) {
			array_push($Data,$row);
		}

		echo json_encode($Data);
	}

?>