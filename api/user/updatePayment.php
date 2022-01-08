<?php
	include '../const.php';

	require_once('../vendor/autoload.php');
	include '../validate.php';
	include '../database/Appdatabase.php';

	if ($token->data->role === 'admin' || $token->data->role === 'user') {

		$uid = $_POST['uuid'];
		$bill_issue = $_POST['bill_issue'];
		$pay_from = $_POST['pay_from'];
		$number_of_months = $_POST['number_of_months'];

		$percent_off = $_POST['percent_off'];
		$other_fee = $_POST['other_fee'];


		if ($_POST['recuring_type'] == 'Months') {
			
			$pay_to = $_POST['pay_to'];
			$rate_per_month = $_POST['rate_per_month'];

			$hour_per_session = null;
			$number_of_sessions = null;
			$rate_per_hour = null;

		}else{			
			$pay_to = $_POST['pay_to'];
			
			$rate_per_month = null;
			$hour_per_session = $_POST['hour_per_session'];
			$number_of_sessions = $_POST['number_of_sessions'];
			$rate_per_hour = $_POST['rate_per_hour'];
			
		};
		$total = $_POST['total'];
		
		$recuring_type = $_POST['recuring_type'];
		$paid_date = $_POST['paid_date'];
		$paid = $_POST['paid'];

		$deposit = $_POST['deposit'];
		$outstanding = $_POST['outstanding'];
		
		$refund = $_POST['refund'];
		$refund_detail = $_POST['refund_detail'];

		$comments = $_POST['comments'];

		$sale_rep_id = $_POST['sale_rep_id'];
		$sale_rep_commission = $_POST['sale_rep_commission'];

		$package_type = $_POST['package_type'];

		$MySQLiconn->query("UPDATE `bill_payment` SET 
			`bill_issue` = '".$bill_issue."',
			`pay_from` = '".$pay_from."',
			`pay_to` = '".$pay_to."',
			`hour_per_session` = '".$hour_per_session."',
			`number_of_sessions` = '".$number_of_sessions."',
			`rate_per_hour` = '".$rate_per_hour."',
			`number_of_months` = '".$number_of_months."',
			`rate_per_month` = '".$rate_per_month."',
			`percent_off` = '".$percent_off."',
			`other_fee` = '".$other_fee."',
			`total` = '".$total."',
			`paid_date` = '".$paid_date."',
			`paid` = '".$paid."',
			`deposit` = '".$deposit."',
			`refund` = '".$refund."',
			`refund_detail` = '".$refund_detail."',
			`outstanding` = '".$outstanding."',
			`recuring_type` = '".$recuring_type."',
			`comments` = '".$comments."',
			`sale_rep_id` = '".$sale_rep_id."',
			`sale_rep_commission` = '".$sale_rep_commission."',
			`package_type` = '".$package_type."'		

		WHERE `uuid` = '".$uid."'");


		$res = 'Success';
		echo json_encode([$res,$uid]);
	}
?>