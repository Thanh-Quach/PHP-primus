<?php

include '../const.php';

require_once('../vendor/autoload.php');
include '../validate.php';
include '../database/Appdatabase.php';

	if ($token->data->role === 'admin') {
		$name = $MySQLiconn->real_escape_string($_POST['name']);
		$id = time().'_'.mt_rand();
		$date_created = time();
		$database_access = $id.'_'.strtolower($name);
		$MySQLiconn->query("INSERT INTO locations(uid,date_created,location_name,database_access) VALUES('$id','$date_created','$name','$database_access')");
		
		$MySQLiconn->query("CREATE TABLE `".$database_access."` (

			uuid VARCHAR(128) PRIMARY KEY,
			reg_date VARCHAR(15) NOT NULL,
			ethnicity VARCHAR(16) NOT NULL,
			gender VARCHAR (1),
			firstname VARCHAR(64) NOT NULL,
			lastname VARCHAR(64) NOT NULL,
			school VARCHAR(256),
			grade VARCHAR(2),
			address VARCHAR(256),
			student_email VARCHAR(128) NOT NULL,
			student_phone VARCHAR(16),
			subjects VARCHAR(256),
			schedules VARCHAR(256),
			hear_from VARCHAR(256),

			other_contact_name_1 VARCHAR(128) NOT NULL,
			other_contact_relation_1 VARCHAR(128) NOT NULL,
			other_contact_phone_1 VARCHAR(16) NOT NULL,
			other_contact_cell_1 VARCHAR(16) NOT NULL,

			other_contact_name_2 VARCHAR(128),
			other_contact_relation_2 VARCHAR(128),
			other_contact_phone_2 VARCHAR(16),
			other_contact_cell_2 VARCHAR(16),

			other_contact_name_3 VARCHAR(128),
			other_contact_relation_3 VARCHAR(128),
			other_contact_phone_3 VARCHAR(16),
			other_contact_cell_3 VARCHAR(16),

			active_status VARCHAR(16)

		)");

		$res = '200 OK';
		echo json_encode($res);
	}
?>