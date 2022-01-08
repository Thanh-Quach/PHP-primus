<?php
	include '../const.php';

	require_once('../vendor/autoload.php');
	include '../validate.php';
	include '../database/Appdatabase.php';

	if ($token->data->role === 'admin' || $token->data->role === 'user') {

		$uid = $_POST['uuid'];
		$reg_date = $_POST['reg_date'];
		$ethnicity = $_POST['ethnicity'];
		$gender = $_POST['gender'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$school = $_POST['school'];
		$grade = $_POST['grade'];
		$address = $_POST['address'];
		$student_email = $_POST['student_email'];
		$student_phone = $_POST['student_phone'];
		$subjects = $_POST['subjects'];
		$hear_from = $_POST['hear_from'];

		$other_contact_name_1 = $_POST['other_contact_name_1'];
		$other_contact_relation_1 = $_POST['other_contact_relation_1'];
		$other_contact_phone_1 = $_POST['other_contact_phone_1'];
		$other_contact_cell_1 = $_POST['other_contact_cell_1'];

		if (isset($_POST['other_contact_name_2'])) {
			$other_contact_name_2 = $_POST['other_contact_name_2'];
			$other_contact_relation_2 = $_POST['other_contact_relation_2'];
			$other_contact_phone_2 = $_POST['other_contact_phone_2'];
			$other_contact_cell_2 = $_POST['other_contact_cell_2'];
		}else{
			$other_contact_name_2 = NULL;
			$other_contact_relation_2 = NULL;
			$other_contact_phone_2 = NULL;
			$other_contact_cell_2 = NULL;
		}

		if (isset($_POST['other_contact_name_3'])) {
			$other_contact_name_3 = $_POST['other_contact_name_3'];
			$other_contact_relation_3 = $_POST['other_contact_relation_3'];
			$other_contact_phone_3 = $_POST['other_contact_phone_3'];
			$other_contact_cell_3 = $_POST['other_contact_cell_3'];
		}else{
			$other_contact_name_3 = NULL;
			$other_contact_relation_3 = NULL;
			$other_contact_phone_3 = NULL;
			$other_contact_cell_3 = NULL;
		}

		$active_status = $_POST['active_status'];


		$MySQLiconn->query("UPDATE `".$_POST['database_access']."` SET 
			`reg_date` = '".$reg_date."',
			`ethnicity` = '".$ethnicity."',
			`gender` = '".$gender."',
			`firstname` = '".$firstname."',
			`lastname` = '".$lastname."',
			`school` = '".$school."',
			`grade` = '".$grade."',
			`address` = '".$address."',
			`student_email` = '".$student_email."',
			`student_phone` = '".$student_phone."',
			`subjects` = '".$subjects."',
			`hear_from` = '".$hear_from."',

			`other_contact_name_1` = '".$other_contact_name_1."',
			`other_contact_relation_1` = '".$other_contact_relation_1."',
			`other_contact_phone_1` = '".$other_contact_phone_1."',
			`other_contact_cell_1` = '".$other_contact_cell_1."',

				`other_contact_name_2` = '".$other_contact_name_2."',
				`other_contact_relation_2` = '".$other_contact_relation_2."',
				`other_contact_phone_2` = '".$other_contact_phone_2."',
				`other_contact_cell_2` = '".$other_contact_cell_2."',

				`other_contact_name_3` = '".$other_contact_name_3."',
				`other_contact_relation_3` = '".$other_contact_relation_3."',
				`other_contact_phone_3` = '".$other_contact_phone_3."',
				`other_contact_cell_3` = '".$other_contact_cell_3."',

			`active_status` = '".$active_status."'


		WHERE `".$_POST['database_access']."`.`uuid` = '".$uid."'");


		$res = 'Success';
		echo json_encode([$res,$uid]);
	}
?>