<div id='add-billing' class="position-absolute w-100 h-100 top-0 shadow-overlay d-flex justify-content-center align-items-center d-none">
	<div class="bg-white rounded position-relative w-75">
	<span class="close ms-auto me-3 my-3" onclick="document.getElementById('add-billing').classList.toggle('d-none'); $('#bill-actionButton').remove(); $('.deposit-container').remove(); $('#refund').val('0'); $('#refund-form').addClass('d-none');"><i class="fa fa-times"></i></span>
		<div id='add-billing-form' class="m-5">
			<div class="dropdown secondary-font">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownButton" data-bs-toggle="dropdown" aria-expanded="false">Sessions</button>
				 <ul class="dropdown-menu" aria-labelledby="dropdownButton">
					<li><a id='sessions-recur' class="dropdown-item" href="#" onclick="$('.session-input').removeClass('d-none');$('.month-input').addClass('d-none');$('#dropdownButton').html('Sessions');updateBillingInput()">Sessions</a></li>
					<li><a id='months-recur' class="dropdown-item" href="#" onclick="$('.month-input').removeClass('d-none');$('.session-input').addClass('d-none');$('#dropdownButton').html('Months');updateBillingInput()">Months</a></li>
				</ul>
			</div>
		                    <div class='w-100 d-flex secondary-font'>
		                        <div class='col-6 lh-base overflow-hidden'>
		                            <div class='d-flex'>
		                                <div class='col-6 form-floating mx-1 mb-3'>
								            <input type="text" name='bill_issue' class="form-control border-0 border-bottom border-2 datepicker" id="bill_issue" placeholder="bill_issue" onfocusout='updateBillingInput()'>
								            <label for="bill_issue" class="bg-custom text-custom ps-0">Bill Issue</label>
		                                </div>
		                                <div class='col-6 form-floating mx-1 mb-3'>
								            <input type="text" name='number_of_months' class="form-control border-0 border-bottom border-2" id="number_of_months" placeholder="number_of_months" value="1" onkeyup='updateBillingInput()'>
								            <label for="number_of_months" class="bg-custom text-custom ps-0">Number of Month(s)</label>
		                                </div>
		                            </div>
		                            <div class='d-flex w-100'>
		                                <div class='col-6 form-floating mx-1 mb-3'>
								            <input type="text" name='pay_from' class="form-control border-0 border-bottom border-2 datepicker" id="pay_from" placeholder="reg-date" onchange='updateBillingInput()'>
								            <label for="pay_from" class="bg-custom text-custom ps-0">Pay From</label>
		                                </div>
		                                <div class='col-6 form-floating mx-1 mb-3'>
								            <input type="text" name='pay_to' class="form-control border-0 border-bottom border-2 datepicker" id="pay_to" placeholder="pay_to">
								            <label for="pay_to" class="bg-custom text-custom ps-0">Pay To</label>
		                                </div>
		                            </div>
		                            <div class="d-flex w-100 session-input">
		                            <div class='col-6 form-floating mx-1 mb-3'>
								            <input type="text" name='number_of_sessions' class="form-control border-0 border-bottom border-2" id="number_of_sessions" placeholder="number_of_sessions" onkeyup='updateBillingInput()'>
								            <label for="number_of_sessions" class="bg-custom text-custom ps-0">Number of Sessions</label>
		                            </div>
		                            <div class='col-6 form-floating mx-1 mb-3'>
								            <input type="text" name='hour_per_session' class="form-control border-0 border-bottom border-2" id="hour_per_session" placeholder="hour_per_session" onkeyup='updateBillingInput()'>
								            <label for="hour_per_session" class="bg-custom text-custom ps-0">Hours per Session</label>
		                            </div>
		                            
		                            </div>
		                            <div class="d-flex d-none w-100 month-input">
		                            <div class='col-6 form-floating mx-1 mb-3 w-100'>
								            <input type="text" name='rate_per_month' class="form-control border-0 border-bottom border-2" id="rate_per_month" placeholder="rate_per_month" onkeyup='updateBillingInput()'>
								            <label for="rate_per_month" class="bg-custom text-custom ps-0" required>Rate per Month*($)</label>
		                            </div>		                            
		                            </div>
		                            <div class="d-flex w-100">
		                            <div class='col-6 form-floating mx-1 mb-3 session-input'>
								            <input type="text" name='rate_per_hour' class="form-control border-0 border-bottom border-2" id="rate_per_hour" placeholder="rate_per_hour" onkeyup='updateBillingInput()'>
								            <label for="rate_per_hour" class="bg-custom text-custom ps-0" required>Rate per Hour*($)</label>
		                            </div>
		                            <div class='col-6 form-floating mx-1 mb-3'>
								            <input type="text" name='percent_off' class="form-control border-0 border-bottom border-2" id="percent_off" placeholder="percent_off">
								            <label for="percent_off" class="bg-custom text-custom ps-0">%off</label>
		                            </div>
		                            </div>
		                            <div class='col-6 form-floating mx-1 mb-3'>
								            <input type="text" name='other_fee' class="form-control border-0 border-bottom border-2" id="other_fee" placeholder="other_fee"onkeyup='updateBillingInput()'>
								            <label for="other_fee" class="bg-custom text-custom ps-0">Other Fees($)</label>
		                            </div>
									<div class='col-6 form-floating mx-1 mb-3 d-flex font-16pt'>
								            <h1 class="bg-custom text-custom ps-0 pe-3">Total($): </h1><h1 id="total"></h1>
		                            </div>
		                            <div class="w-100" id="paid-section">
										<div class="d-flex w-100 align-items-center">
											<div class='col-6 form-floating mx-1 mb-3'>
										            <input type="text" name='paid' id='paid' class="form-control border-0 border-bottom border-2 paid" placeholder="paid" onkeyup='updateBillingInput()'>
										            <label for="paid" class="bg-custom text-custom ps-0">Paid($)</label>
				                            </div>
											<div class='col-5 form-floating mx-1 mb-3'>
										            <input type="text" name='paid_date' id='paid_date' class="form-control border-0 border-bottom border-2 datepicker" placeholder="paid_date">
										            <label for="paid_date" class="bg-custom text-custom ps-0">Paid Date</label>
				                            </div>
				                            <a href='#' class='prime-font mx-auto col-1'><i class='mx-1 col fa fa-plus font-16pt link-dark' onclick='addDeposit()'></i></a>
			                        	</div>
									<div id='refund-form' class='secondary-font w-100 d-flex align-items-center mx-auto my-4 d-none'>
										<div class='form-floating mx-1 col'>
									       <input type='refund' name='refund' class='form-control border-0 border-bottom border-2' id='refund' placeholder='refund' value='0' onkeyup='updateBillingInput()'>
									       <label for='refund' class='bg-custom text-custom ps-0'>Refund($)</label>
									    </div>
										<textarea class='form-control col' aria-label='With textarea' style='height: 50px;' id='refund-detail' placeholder='Comments'></textarea>
									</div>
		                        	</div>
									<div class='col-6 form-floating mx-1 mb-3 d-flex font-16pt'>
								            <h1 class="bg-custom text-custom ps-0 pe-3">Outstanding($): </h1><h1 id="outstanding"></h1>
		                            </div>

		                        </div>
		                        <div class='col-6 lh-base'>
		                            <div class="col-10 d-flex mx-auto">
							          <div class="form-floating mx-1 col-6">
										  <select class="form-select border-0 border-bottom border-2 lh-base" id="sale_rep_id">
										    
										  </select>
										  <label class="bg-custom text-custom ps-0" for="sale_rep_id">Sale's Rep</label>
									  </div>
									<div class='col-6 form-floating mx-1 mb-3'>
								            <input type="text" name='sale_rep_commission' class="form-control border-0 border-bottom border-2" id="sale_rep_commission" placeholder="reg-date">
								            <label for="sale_rep_commission" class="bg-custom text-custom ps-0">Commission</label>
		                            </div>
		                            </div>
		                            <div class="col-10 mx-auto">
		                               	<label class="bg-custom text-custom ps-0 pb-3">Package Type</label>
							          	<div id='package_type' class="d-flex align-items-center">
								            <div class="form-check me-5">
											  <input name='package_type' class="form-check-input mt-0" type="radio" value="A" id="flexCheckDefault" checked>
											  <label class="form-check-label" for="flexCheckDefault">
											    A
											  </label>
											</div>
											<div class="form-check">
											  <input name='package_type' class="form-check-input mt-0" type="radio" value="B" id="flexCheckChecked">
											  <label class="form-check-label" for="flexCheckChecked">
											    B
											  </label>
											</div>
										</div>
		                            </div>
		                            <div class='secondary-font col-10 mx-auto my-4'>
		                            	<p class='pb-2 bg-custom text-custom'>Comments:</p>
		                            	<textarea class="form-control" aria-label="With textarea" style="height: 100px;" id='comments'></textarea>
		                        	</div>
		                        </div>

		                    </div>

		</div>
	</div>
</div>
<script>
var today = new Date();
$('#bill_issue').val(toDate(today));
$('#pay_from').val(toDate(today));
$('#paid_date').val(toDate(today));
if (JSON.parse(JSON.parse(sessionStorage.getItem('studentInfo'))[0].schedules) !== null && JSON.parse(JSON.parse(sessionStorage.getItem('studentInfo'))[0].schedules !== '')) {
	if($('#dropdownButton').html() == 'Sessions'){
		$('#number_of_sessions').val(Number(JSON.parse(JSON.parse(sessionStorage.getItem('studentInfo'))[0].schedules).length) * $('#number_of_months').val() * 4);
		$('#hour_per_session').val(hourCalculation(JSON.parse(JSON.parse(sessionStorage.getItem('studentInfo'))[0].schedules)[0][1])[0]);
	}else{
		$('#number_of_sessions').val('');
		$('#hour_per_session').val('');
	}
}
$('#other_fee').val(JSON.parse(JSON.parse(sessionStorage.getItem('studentInfo'))[0].subjects).length*5)
window.onload = updateBillingInput();
function toDate(value){
	var dd = String(value.getDate()).padStart(2, '0');
	var mm = String(value.getMonth()+1).padStart(2, '0');
	var yyyy = value.getFullYear();

	return mm + '/' + dd + '/' + yyyy;
}

function dateToTime(value){
	var currentTime = new Date(value);
	return currentTime.getTime();
}

function updateBillingInput() {
	$('#total').html('0');
	if ($('#number_of_months').val() < 3) {
		$('#percent_off').val('0')
	}else if ($('#number_of_months').val() < 6) {
		$('#percent_off').val('5')
	}
	else if ($('#number_of_months').val() < 9) {
		$('#percent_off').val('10');
	}else if ($('#number_of_months').val() >= 12) {
		$('#percent_off').val('15')
	}
	if($('#dropdownButton').html() == 'Months'){
		var payfrom = new Date(dateToTime($('#pay_from').val()));
		var dif = new Date(dateToTime($('#pay_from').val()) + 2629743 * $('#number_of_months').val()*1000).getDate() - payfrom.getDate();
		var payto = new Date(dateToTime($('#pay_from').val()) + 2629743 * $('#number_of_months').val()*1000 - dif*86400000);

		$('#pay_to').val(toDate(payto));

		var total = $('#rate_per_month').val()*$('#number_of_months').val() * [100 - Number($('#percent_off').val())]/100 + Number($('#other_fee').val());
		$('#total').html(total);
	}else{
		var payfrom = new Date(dateToTime($('#pay_from').val()));
		var dif = new Date(dateToTime($('#pay_from').val()) + [2419200*$('#number_of_months').val()-604800]*1000).getDay() - payfrom.getDay();
		var payto = new Date(dateToTime($('#pay_from').val()) + [2419200*$('#number_of_months').val()-604800]*1000 - dif*86400000);

		$('#pay_to').val(toDate(payto));
		var total = Number($('#hour_per_session').val())*Number($('#number_of_sessions').val())*Number($('#rate_per_hour').val())*Number($('#number_of_months').val())*[100 - Number($('#percent_off').val())]/100 + Number($('#other_fee').val()) - $('#refund').val();
		$('#total').html(total);

	}
	var depositSum = 0;
	$('.deposit').each(function(){
	    depositSum += parseFloat(this.value);
	});
	$('#outstanding').html([Number(total) - depositSum - Number($('.paid').val())])

}
</script>