<?php
	include '../const.php';

	require_once('../vendor/autoload.php');
	include '../validate.php';
	include '../database/database.php';
	if ($token->data->role === 'admin') {
		$username = $MySQLiconn->real_escape_string($_POST['username']);
		$password = $MySQLiconn->real_escape_string($_POST['password']);
		$location = $MySQLiconn->real_escape_string($_POST['location']);
		$uid = time().'_'.mt_rand();
		$role = 'user';

		$MySQLiconn->query("INSERT INTO users(uid,username,password,accessible_location,role) VALUES('$uid','$username','$password','$location','$role')");

		$res = '200 OK';
		echo json_encode($res);
	}
?>