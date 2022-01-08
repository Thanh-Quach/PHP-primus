<?php
	include '../const.php';

	require_once('../vendor/autoload.php');
	include '../validate.php';
	include '../database/Appdatabase.php';

	if ($token->data->role === 'admin' || $token->data->role === 'user') {

		$uid = time().'_'.mt_rand();
		$studentUID = $_POST['uuid'];

		if (isset($_POST['bill_issue'])) {
			$bill_issue = $_POST['bill_issue'];
		}else{
			$bill_issue = time();
		}
		if (isset($_POST['pay_from'])) {
			$pay_from = $_POST['pay_from'];
		}else{
			$pay_from = time();
		}

		if (isset($_POST['number_of_months'])) {
			$number_of_months = $_POST['number_of_months'];
		}else{
			$number_of_months = 1;
		}


		if ($number_of_months > 12) {
			$percent_off = 15;
		}else if($number_of_months >= 6){
			$percent_off = 10;
		}else if ($number_of_months >= 3){
			$percent_off = 5;
		}else {
			$percent_off = 0;
		}
		
		if (isset($_POST['other_fee'])) {
			$other_fee = $_POST['other_fee'];
		}else{
			$other_fee = 5;
		}


		if ($_POST['recuring_type'] == 'Months') {
			if (isset($_POST['pay_to'])) {
				$pay_to = $_POST['pay_to'];
			}else{
				$pay_to = $pay_from + 2629743 * $number_of_months;
			}
			$rate_per_month = $_POST['rate_per_month'];

			$hour_per_session = null;
			$number_of_sessions = null;
			$rate_per_hour = null;
			if (isset($_POST['total'])) {
				$total = $_POST['total'];
			}else{
				$total = $rate_per_month*$number_of_months*(100-$percent_off)/100 + $other_fee;
			}
		}else{			
			if (isset($_POST['pay_to'])) {
				$pay_to = $_POST['pay_to'];
			}else{
				$pay_to = $pay_from + 1814400 * $number_of_months;
			}	
			$rate_per_month = null;

			$hour_per_session = $_POST['hour_per_session'];
			$number_of_sessions = $_POST['number_of_sessions'];
			$rate_per_hour = $_POST['rate_per_hour'];
			
			if (isset($_POST['total'])) {
				$total = $_POST['total'];
			}else{
				$total = $hour_per_session*$number_of_sessions*$rate_per_hour*$number_of_months*(100-$percent_off)/100 + $other_fee;
			}	
		};

		$recuring_type = $_POST['recuring_type'];
			if (isset($_POST['paid_date'])) {
				$paid_date = $_POST['paid_date'];
			}else{
				$paid_date = null;
			}

			if (isset($_POST['paid'])) {
				$paid = $_POST['paid'];
			}else{
				$paid = 0;
			}
		if (isset($_POST['deposit'])) {
			$deposit = $_POST['deposit'];
		}else{
			$deposit = null;
		}
		if (isset($_POST['refund_detail'])) {
			$refund_detail = $_POST['refund_detail'];
		}else{
			$refund_detail = null;
		}
		if (isset($_POST['outstanding'])) {
			$outstanding = $_POST['outstanding'];
		}else{
			$outstanding = $total - $paid;
		}
		
		if (isset($_POST['refund'])) {
			$refund = $_POST['refund'];
		}else{
			$refund = null;
		};

		if(isset($_POST['comments'])){
			$comments = $_POST['comments'];
		}else{
			$comments = null;
		}

		if (isset($_POST['sale_rep_id'])) {
			$sale_rep_id = $_POST['sale_rep_id'];
			$sale_rep_commission = $_POST['sale_rep_commission'];
		}else{
			$sale_rep_id = null;
			$sale_rep_commission = null;
		}
		$package_type = $_POST['package_type'];


		$MySQLiconn->query("INSERT INTO `bill_payment`
			(
			`uuid`,
			`student_uid`,

			`bill_issue`,
			`pay_from`,
			`pay_to`,

			`hour_per_session`,
			`number_of_sessions`,
			`rate_per_hour`,
			`number_of_months`,
			`rate_per_month`,
			`recuring_type`,

			`percent_off`,
			`other_fee`,
			`total`,
			`paid_date`,
			`paid`,
			`deposit`,
			`outstanding`,
			`refund`,
			`refund_detail`,
			`comments`,

			`sale_rep_id`,
			`sale_rep_commission`,
			`package_type`

			)
			VALUES 
			(
			'$uid',
			'$studentUID',

			'$bill_issue',
			'$pay_from',
			'$pay_to',

			'$hour_per_session',
			'$number_of_sessions',
			'$rate_per_hour',
			'$number_of_months',
			'$rate_per_month',
			'$recuring_type',

			'$percent_off',
			'$other_fee',
			'$total',
			'$paid_date',
			'$paid',
			'$deposit',
			'$outstanding',
			'$refund',
			'$refund_detail',
			'$comments',

			'$sale_rep_id',
			'$sale_rep_commission',
			'$package_type'

			)");


		$res = 'Success';
		echo json_encode([$res,$uid]);
	}
?>