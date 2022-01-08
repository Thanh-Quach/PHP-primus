<?php
	if (!isset($token)) {
		include '../const.php';
		require_once('../vendor/autoload.php');
		include '../validate.php';
		include '../database/database.php';
	}else{
		$MySQLiconn = new MySQLi(_HOST_NAME,_DATABASE_USER_NAME,_DATABASE_PASSWORD,'user_tkn');
	}

	if ($token->data->role === 'admin') {
		if (!isset($_POST['name'])) {
			$MySQLiconn->query("DELETE FROM users WHERE uid='".$_POST['uid']."'");
			$res = '200 OK';
			echo json_encode($res);
		}else{
			$MySQLiconn->query("DELETE FROM users WHERE accessible_location='".$_POST['uid']."_".$_POST['name']."'");
		}
	}
?>