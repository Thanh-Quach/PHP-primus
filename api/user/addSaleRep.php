<?php
	include '../const.php';

	require_once('../vendor/autoload.php');
	include '../validate.php';
	include '../database/Appdatabase.php';

	if ($token->data->role === 'admin' || $token->data->role === 'user') {
		
	$uid = time().'_'.mt_rand();
	$name = $_POST['name'];
	$db_access = $_POST['database_access'];


	$MySQLiconn->query("INSERT INTO `sale_rep`
		(
		`uid`,
		`name`,
		`db_access`
		)
		VALUES 
		(
		'$uid',
		'$name',
		'$db_access'
		)");

		$res = 'Success';
		echo json_encode([$res, $uid, $name]);
	}


?>