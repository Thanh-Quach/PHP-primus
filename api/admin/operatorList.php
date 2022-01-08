<?php
	include '../const.php';

	require_once('../vendor/autoload.php');
	include '../validate.php';
	include '../database/database.php';

	if ($token->data->role === 'admin') {
		$Data = [];

		$res = $MySQLiconn->query("SELECT *  FROM users WHERE accessible_location = '".$_POST['uid']."'");
		while ($row = $res->fetch_assoc()) {
			array_push($Data,$row);
		}

		echo json_encode($Data);
	}
?>