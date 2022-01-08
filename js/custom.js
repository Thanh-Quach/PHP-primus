$(".validationInput").keyup( function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   $(".validateButton").click();
  }
});

$(".caret-spin").click(function(event) {
		$(this).children('.fa').toggleClass('spin90');
})
$(".datepicker").datepicker();
if (sessionStorage.getItem('studentInfo') !== '' || sessionStorage.getItem('studentInfo') !== null) {
	var studentInfo = JSON.parse(sessionStorage.getItem('studentInfo'));
	window.onload = displayStudent(studentInfo);
}

//trigger

var contactIndex = 2;
function addContact(){
	$('#parent-side').append(
						'<div class="d-flex mb-3 w-100 rel-'+contactIndex+'">'+
		          '<div class="form-floating mx-1 w-50">'+
		            '<input type="text" name="rel-'+contactIndex+'" class="form-control border-0 border-bottom border-2" id="rel-'+contactIndex+'" placeholder="rel-'+contactIndex+'">'+
		            '<label for="rel-'+contactIndex+'" class="bg-custom text-custom ps-0">Relation</label>'+
		          '</div>'+
		          '<div class="form-floating mx-1 w-50">'+
		            '<input type="text" name="rel-'+contactIndex+'-fullname" class="form-control border-0 border-bottom border-2" id="rel-'+contactIndex+'-fullname" placeholder="rel-'+contactIndex+'-fullname">'+
		            '<label for="rel-'+contactIndex+'-fullname" class="bg-custom text-custom ps-0">Full Name</label>'+
		          '</div>'+
		      	'</div>'+
		        '<div class="d-flex mb-3 w-100 rel-'+contactIndex+'">'+
		          '<div class="form-floating mx-1 w-50">'+
		            '<input type="text" name="rel-'+contactIndex+'-phone" class="form-control border-0 border-bottom border-2" id="rel-'+contactIndex+'-phone" placeholder="rel-'+contactIndex+'-phone">'+
		            '<label for="rel-'+contactIndex+'-phone" class="bg-custom text-custom ps-0">Cell phone</label>'+
		         ' </div>'+
		          '<div class="form-floating mx-1 w-50">'+
		            '<input type="email" name="rel-'+contactIndex+'-email" class="form-control border-0 border-bottom border-2" id="rel-'+contactIndex+'-email" placeholder="rel-'+contactIndex+'-email">'+
		            '<label for="rel-'+contactIndex+'-email" class="bg-custom text-custom ps-0">Home phone</label>'+
		          '</div>'+
		      	'</div>'
		      	)
	contactIndex = contactIndex + 1;
	$('#removeButton').removeClass('d-none');
	if (contactIndex > 3) {
			$('#addButton').addClass('d-none');
	}
	};
function removeContact() {
	if (contactIndex <= 3) {
		$('#removeButton').addClass('d-none');
	}
	contactIndex = contactIndex - 1;
	$('.rel-'+contactIndex).remove();
	if (contactIndex <= 3) {
			$('#addButton').removeClass('d-none');
	}
}
function clearInput() {
	$('.form-control').val('');
	$('.form-check-input[type="checkbox"]').prop('checked', false);
}


//google maps
    "use strict";

    function initMap() {
      const componentForm = [
        'address',
      ];
      const autocompleteInput = document.getElementById('address');
      const autocomplete = new google.maps.places.Autocomplete(autocompleteInput);
      autocomplete.addListener('place_changed', function () {
        const place = autocomplete.getPlace();
        fillInAddress(place);
      });

      function fillInAddress(place) {  // optional parameter
        const addressNameFormat = {
          'street_number': 'short_name',
          'route': 'long_name',
          'locality': 'long_name',
          'administrative_area_level_1': 'short_name',
          'country': 'long_name',
          'postal_code': 'short_name',
        };
        const getAddressComp = function (type) {
          for (const component of place.address_components) {
            if (component.types[0] === type) {
              return component[addressNameFormat[type]];
            }
          }
          return '';
        };
        document.getElementById('address').value = getAddressComp('street_number') + ' '
                  + getAddressComp('route')+ ', '
                  + getAddressComp('locality')+ ', '
                  + getAddressComp('administrative_area_level_1')+ ', '
                  + getAddressComp('country')+ ', '
                  + getAddressComp('postal_code');
      }
    }


function showRemovePrompt(data) {
	document.getElementById('remove-location').classList.toggle('d-none');
	document.querySelector('h3').innerHTML = 'Are you sure you want to remove location '+data.location_name+' and all its students?';
	document.getElementById('remove-location-name').value = data.location_name;
	document.getElementById('remove-uid').value = data.uid;
}
function joinLocation(data){
	localStorage.setItem('location', JSON.stringify(data));
}
function editLocationPrompt(data){
	document.getElementById('edit-location').classList.toggle('d-none');
	document.getElementById('edit-location-name').innerHTML = data.location_name;
	document.getElementById('edit-location-uid').value = data.uid;
	operatorList();
}


function inputFilter(value) {
	$('.filter-list').removeClass('d-none');
    var input = $('.filter-input').val();
    var filter = input.toUpperCase();
    var li = $('.filter-list-items');
    for (i = 0; i < li.length; i++) {
    	if (value == 'student') {
        var name = li[i].querySelectorAll(".studentname")[0];
        var phonenumber = li[i].querySelectorAll(".studentphone")[0];
      }
      if (value == 'location') {
      	var name = li[i].querySelectorAll(".locationname")[0];
      }
      txtName = name.textContent || name.innerText;   
      txtPhone = phonenumber.textContent || phonenumber.innerText;
      if (txtName.toUpperCase().indexOf(filter) > -1 || txtPhone.toUpperCase().indexOf(filter) > -1) {
        li[i].classList.remove('d-none');
      } else {
        li[i].classList.add('d-none');
      }
      if (filter.length < 1) {
      	$('.filter-list').addClass('d-none');
      }
   }

}

schedulesIndex = 0
function moreSchedule(index) {
	if (index) {
		schedulesIndex = schedulesIndex + index;
	}else{
		schedulesIndex = schedulesIndex + 1;
	}
	$('#schedule-list').append(
		"<div class='moreDate-"+schedulesIndex+" mb-3 d-flex justify-content-around w-100'>"+
		"<input type='text' placeholder='E.g: Mon' class='mx-1 secondary-font form-control border-0 border-bottom border-2 col date-input'>"+
		"<input type='text' placeholder='E.g: 12:30-2:00' class='mx-1 secondary-font form-control border-0 border-bottom border-2 col time-input'>"+
		"<a href='#' class='remove-date prime-font mx-auto'><i class='mx-1 col fa fa-minus font-16pt link-dark' onclick='lessSchedule("+schedulesIndex+")'></i></a>"+
		"</div>")
	
}
function lessSchedule(index) {
	$(".moreDate-"+index).remove();
}

function showScheduleForm(uuid) {
	var scheduleInfo = JSON.parse(JSON.parse(sessionStorage.getItem('studentInfo'))[0].schedules);
	$('#add-schedule').toggleClass('d-none');
	$('#uuid').val(uuid);
	if (scheduleInfo && scheduleInfo.length > 0) {
		$('#schedule-list').html(
			"<div class='mb-3 d-flex justify-content-around w-100'>"+
				"<input type='text' placeholder='E.g: Mon' class='mx-1 secondary-font form-control border-0 border-bottom border-2 col date-input' value='"+scheduleInfo[0][0]+"'>"+
				"<input type='text' placeholder='E.g: 12:30-2:00' class='mx-1 secondary-font form-control border-0 border-bottom border-2 col time-input' value='"+scheduleInfo[0][1]+"'>"+
				"<a href='#' id='add-date' class='prime-font mx-auto'><i class='mx-1 col fa fa-plus font-16pt link-dark' onclick='moreSchedule("+scheduleInfo.length+")'></i></a>"+
			"</div>"
		);
		for (var i = 1; i < scheduleInfo.length; i++) {
			$('#schedule-list').append(
				"<div class='moreDate-"+i+" mb-3 d-flex justify-content-around w-100'>"+
					"<input type='text' placeholder='E.g: Mon' class='mx-1 secondary-font form-control border-0 border-bottom border-2 col date-input' value='"+scheduleInfo[i][0]+"'>"+
					"<input type='text' placeholder='E.g: 12:30-2:00' class='mx-1 secondary-font form-control border-0 border-bottom border-2 col time-input' value='"+scheduleInfo[i][1]+"'>"+
					"<a href='#' class='remove-date prime-font mx-auto'><i class='mx-1 col fa fa-minus font-16pt link-dark' onclick='lessSchedule("+i+")'></i></a>"+
				"</div>");
		}
	}
}

function displayStudent(data){
	if (data !== null && data !== '') {
		if (data[0].gender == 'M') {
			var gender = 'Male';
		}else{
			var gender = 'Female';
		}
		subjects = JSON.parse(data[0].subjects);
			$('.filter-list').addClass('d-none');
			$('#students-info').html(
				"<div class='p-2 secondary-font lh-base'>"+
					"<p class=''><b class='fw-bold'>Register Date:</b> "+timeStamptoDate(data[0].reg_date)+"</p>"+
					"<h3 class=''><b class='fw-bold'>Name: </b>"+data[0].firstname+" "+data[0].lastname+"</h3>"+
					"<p><b class='fw-bold'>Ethnicity:</b> "+data[0].ethnicity+"</p>"+
					"<p><b class='fw-bold'>Gender: </b>"+gender+"</p>"+

					"<div class='row py-3'>"+
						"<p class='col-12'><b class='fw-bold'>Phone:</b> "+data[0].student_phone+"</p>"+
						"<p class='col-12'><b class='fw-bold'>Email:</b> "+data[0].student_email+"</p>"+
						"<p class='col-12'><b class='fw-bold'>Grade:</b> "+data[0].grade+"</p>"+
						"<p class='col-12'><b class='fw-bold'>School:</b> "+data[0].school+"</p>"+
						"<p class='col-12 pb-3'><b class='fw-bold'>Address:</b> "+data[0].address+"</p>"+
						"<p id='studentSub' class='col-12'><b class='fw-bold'>Subject: </b></p>"+
						"<p class='col-12'><b class='fw-bold'>Hear from:</b> "+data[0].hear_from+"</p>"+
					"</div>"+
				"</div>"
			);
			for (var i = 0; i < subjects.length; i++) {
				$('#studentSub').append(subjects[i]+', ');
			};
			console.log(data)
			$('#students-info').addClass('show');
			$('#guardian-contacts').html(
				"<div class='p-2 secondary-font lh-base'>"+
					"<div class='row py-1'>"+
						"<p class='col-12'><b class='fw-bold'>Relation:</b> "+data[0].other_contact_relation_1+"</p>"+
						"<p class='col-12'><b class='fw-bold'>Full name:</b> "+data[0].other_contact_name_1+"</p>"+
						"<p class='col-12'><b class='fw-bold'>Home phone:</b> "+data[0].other_contact_phone_1+"</p>"+
						"<p class='col-12'><b class='fw-bold'>Cellphone:</b> "+data[0].other_contact_cell_1+"</p>"+
					"</div>"+
				"</div>"
			);
			if (data[0].other_contact_relation_2 !== '' && data[0].other_contact_relation_2 !== null) {
				$('#guardian-contacts').append(
				"<div class='p-2 secondary-font lh-base'>"+
					"<div class='row py-1'>"+
						"<p class='col-12'><b class='fw-bold'>Relation:</b> "+data[0].other_contact_relation_2+"</p>"+
						"<p class='col-12'><b class='fw-bold'>Full name:</b> "+data[0].other_contact_name_2+"</p>"+
						"<p class='col-12'><b class='fw-bold'>Home phone:</b> "+data[0].other_contact_phone_2+"</p>"+
						"<p class='col-12'><b class='fw-bold'>Cellphone:</b> "+data[0].other_contact_cell_2+"</p>"+
					"</div>"+
				"</div>"
			);
			}
			if (data[0].other_contact_relation_3 !== '' && data[0].other_contact_relation_3 !== null) {
				$('#guardian-contacts').append(
				"<div class='p-2 secondary-font lh-base'>"+
					"<div class='row py-1'>"+
						"<p class='col-12'><b class='fw-bold'>Relation:</b> "+data[0].other_contact_relation_3+"</p>"+
						"<p class='col-12'><b class='fw-bold'>Full name:</b> "+data[0].other_contact_name_3+"</p>"+
						"<p class='col-12'><b class='fw-bold'>Home phone:</b> "+data[0].other_contact_phone_3+"</p>"+
						"<p class='col-12'><b class='fw-bold'>Cellphone:</b> "+data[0].other_contact_cell_3+"</p>"+
					"</div>"+
				"</div>"
				);
			}
			if (data[0].schedules !== '' && data[0].schedules !== null) {
				var schedules = JSON.parse(data[0].schedules);
				$('#students-schedule').html('');
				for (var i = 0; i < schedules.length; i++) {
					$('#students-schedule').append(
								"<p class='col-12'><b class='fw-bold'>Session "+[i+1]+": </b>"+schedules[i][0]+" "+schedules[i][1]+"</p>"
						);
					}
					$('#students-schedule').append(
							"<button type='button' class='btn prime-font col-3 mx-auto border-custom text-center my-2' onclick='showScheduleForm("+JSON.stringify(data[0].uuid)+")' >Edit Schedule</button>"
					);
							PaymentDetails(data[0].uuid);
			}else{
				$('#students-schedule').html(
					"<button type='button' class='btn prime-font col-3 mx-auto border-custom text-center my-2' onclick='showScheduleForm("+JSON.stringify(data[0].uuid)+")' >Add Schedule</button>"
				);
			}
			$('.on-event-click').children('.fa').addClass('spin90');
	    $('#students-schedule').addClass('show');
		}

}
function editStudentInfo(action) {
    $('#users-register').toggleClass('d-none');
    studentInfo = JSON.parse(sessionStorage.getItem('studentInfo'))[0];

    		$('#reg-date').val(toDate(new Date(studentInfo.reg_date*1000)));
        $('#ethnicity').val(studentInfo.ethnicity);
        $('#gender').val(studentInfo.gender);
        $('#firstname').val(studentInfo.firstname);
        $('#lastname').val(studentInfo.lastname);

        
		    JSON.parse(studentInfo.subjects).forEach(element => {
		    	if($('#subjects input[value = '+ element + ']').length !== 0){
		      	$('#subjects input[value = '+ element + ']').prop('checked', true);
		      }else{
		      	$('#other-sub').prop('checked', true);
		      	$('#other-sub-value').val(element);
		      }
		    });

        $('#school').val(studentInfo.school);
        $('#grade').val(studentInfo.grade);
        $('#address').val(studentInfo.address);
        $('#email').val(studentInfo.student_email);
        $('#phone').val(studentInfo.student_phone);
        $('#hear-from').val(studentInfo.hear_from);


        $('#rel-1-fullname').val(studentInfo.other_contact_name_1);
        $('#rel-1').val(studentInfo.other_contact_relation_1);
        $('#rel-1-phone').val(studentInfo.other_contact_phone_1);
        $('#rel-1-email').val(studentInfo.other_contact_cell_1);

		    if (studentInfo.other_contact_name_2 !== '') {
		    		$('#addButton').click();
		            $('#rel-2-fullname').val(studentInfo.other_contact_name_2);
		            $('#rel-2').val(studentInfo.other_contact_relation_2);
		            $('#rel-2-phone').val(studentInfo.other_contact_phone_2);
		            $('#rel-2-email').val(studentInfo.other_contact_cell_2);
		    }
		    if (studentInfo.other_contact_name_3 !== '') {
		    		$('#addButton').click();
		            $('#rel-2-fullname').val(studentInfo.other_contact_name_3);
		            $('#rel-2').val(studentInfo.other_contact_relation_3);
		            $('#rel-2-phone').val(studentInfo.other_contact_phone_3);
		            $('#rel-2-email').val(studentInfo.other_contact_cell_3);
		    }

    $('#control-button #register-btn').addClass('d-none');
    $('#control-button').prepend(
    	"<button id='edit-btn' class='btn prime-font col-3 mx-auto btn-custom text-white text-center' onclick='saveStudentInfo("+JSON.stringify(studentInfo.uuid)+")'>Save</button>"
    );
}
function closeRegForm(){
	studentInfo = JSON.parse(sessionStorage.getItem('studentInfo'))[0];
  
  if (studentInfo.other_contact_name_2 !== '') {
   	$('#removeButton').click();
  }
  if (studentInfo.other_contact_name_3 !== '') {
   	$('#removeButton').click();
  }

	$('#users-register').toggleClass('d-none');
	$('#control-button #edit-btn').remove();
	$('#control-button #register-btn').removeClass('d-none');
}

function displayPaymentInfo(paymentDetails) {
		paidSum = 0;
		if (paymentDetails[0].deposit > 0) {
			JSON.parse(paymentDetails[0].deposit).forEach(element => {
					paidSum += parseFloat(element[0]);
			});
		}else{
			paidSum = 0;
		}
		var sale_rep = getSaleRep(paymentDetails[0].sale_rep_id)[0] || {'name':'DataPi'};
		var lastestPayment = paymentDetails.length - 1;
        $('#payment-info').html(
        	"<div class='col-12 border-0 py-2 prime-font bg-custom text-white d-flex m-0 justify-content-around align-items-center'><h3 class='col-7'>Payment</h3><a href='' class='secondary-font d-flex col-4 justify-content-end text-white align-items-center' onclick='showEditBillForm("+JSON.stringify(paymentDetails[lastestPayment].student_uid)+","+JSON.stringify('create')+");'>new payment<i class='fa fa-plus font-16pt ms-2'></i></a></div>"+
						"<div class='accordion' id='bills-info'>"+
            "<div class='accordion-item'>"+
                "<h3 class='acordion-header col-12 secondary-font text-warning'>"+
                    "<button class='ps-4 col-12 border-0 py-2 bg-custom text-white row m-0 justify-content-between align-items-center caret-spin' type='button' data-bs-toggle='collapse' data-bs-target='#collapse-"+lastestPayment+"' aria-expanded='true' aria-controls='#collapse-"+lastestPayment+"'  style='opacity: 0.7;'>"+
                        "<p class='col-11'>"+timeStamptoDate(paymentDetails[lastestPayment].pay_from, 'month')+", "+ timeStamptoDate(paymentDetails[lastestPayment].bill_issue, 'year') +"</p><i class='col-1  text-center fa fa-caret-left font-16pt spin90'></i>"+
                    "</button>"+
                "</h3>"+
                "<div id='collapse-"+lastestPayment+"' class='accordion-collapse collapse show lighter' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>"+
                  "<div class='accordion-body'>"+
                    "<div class='w-100 d-flex secondary-font'>"+
                        "<div class='col-7 lh-base'>"+
                            "<h3 class='pb-2'><b class='fw-bold'>Bill issue day: </b>"+timeStamptoDate(paymentDetails[lastestPayment].bill_issue)+"</h3>"+
                            "<h3 class='pb-3'><b class='fw-bold'>Period: </b>"+timeStamptoDate(paymentDetails[lastestPayment].pay_from)+" - "+timeStamptoDate(paymentDetails[lastestPayment].pay_to)+"</h3>"+
                            "<div class='darker d-flex'>"+
                                "<div class='col-6 d-flex flex-column ps-2 py-2'>"+
                                    "<p>Hours per session:</p>"+
                                    "<p>Number of sessions:</p>"+
                                    "<p>Rate per hours:</p>"+
                                    "<p>%off:</p>"+
                                    "<p>Tutoring Supply:</p>"+
                                    "<br>"+
                                    "<p class=''><b class='fw-bold'>Total:</b></p>"+
                                    "<p class=''><b class='fw-bold'>Paid:</b></p>"+
                                    "<p class='darker py-1'><b class='px-2 fw-bold'>Outstanding:</b></p>"+
                                "</div>"+
                                "<div class='col-6 d-flex flex-column align-items-end pe-2 py-2'>"+
                                    "<p>"+paymentDetails[lastestPayment].hour_per_session+" hours</p>"+
                                    "<p>"+paymentDetails[lastestPayment].number_of_sessions+" sessions</p>"+
                                    "<p>$"+paymentDetails[lastestPayment].rate_per_hour+"</p>"+
                                    "<p>"+paymentDetails[lastestPayment].percent_off+"%</p>"+
                                    "<p>$"+paymentDetails[lastestPayment].other_fee+"</p>"+
                                    "<br>"+
                                    "<p class='w-100'><b class='fw-bold d-flex justify-content-end'> $"+paymentDetails[lastestPayment].total+"</b></p>"+
                                    "<p class='w-100'><b class='fw-bold d-flex justify-content-end'> $"+[Number(paymentDetails[lastestPayment].paid) + Number(paidSum)]+"</b></p>"+
                                    "<p class='darker w-100 py-1'><b class='px-2 fw-bold d-flex justify-content-end'> $"+paymentDetails[lastestPayment].outstanding+"</b></p>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                        "<div class='col-5 d-flex justify-content-center align-items-center'>"+
                            "<div>"+
                                "<h3 class='pb-2'><b class='fw-bold'>Sale representative: </b>"+sale_rep.name+"</h3>"+
		                            "<h3 class='pb-2'><b class='fw-bold'>Commissions: </b>"+paymentDetails[lastestPayment].sale_rep_commission+"</h3>"+
                                "<h3 class='pb-3'><b class='fw-bold'>Recuring Type: </b>"+paymentDetails[lastestPayment].recuring_type+"</h3>"+
                                "<br>"+
                                "<h3 class='pb-3'><b class='fw-bold'>Package Type: </b>"+paymentDetails[lastestPayment].package_type+"</h3>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                        "<div id='bill-comments' class='secondary-font w-100 my-4'>"+
                            "<p class='fw-bold'>Comments:</p>"+
                            "<p class='p-2'>"+paymentDetails[lastestPayment].comments+"</p>"+
                        "</div>"+
                        "<div class='d-flex align-items-center justify-content-end'>"+
                            "<u><a href='' class='mx-2 prime-font bg-custom text-custom' onclick='viewPrint("+JSON.stringify(paymentDetails[lastestPayment].uuid)+")'>View/Print Billing</a></u>"+
                            "<button type='button' class='mx-2 col-2 btn prime-font btn-custom text-white text-center' onclick='showEditBillForm("+JSON.stringify(paymentDetails[lastestPayment].uuid)+","+JSON.stringify('edit')+")'>Edit</button>"+
                            "<button type='button' class='mx-2 col-2 btn prime-font border-custom text-center' onclick='deleteForm("+JSON.stringify(paymentDetails[lastestPayment].uuid)+")'>Delete</button>"+ 
                        "</div>"+
                  "</div>"+
                "</div>"+
               "</div>"+
            "</div>"
        );
				if (paymentDetails.length > 1) {
	        for (i = lastestPayment - 1; i >= 0 ; i--){
	            $('#bills-info').append(
		            "<div class='accordion-item'>"+
		                "<h3 class='acordion-header col-12 secondary-font text-warning'>"+
		                    "<button class='ps-4 col-12 border-0 py-2 bg-custom text-white row m-0 justify-content-between align-items-center caret-spin' type='button' data-bs-toggle='collapse' data-bs-target='#collapse-"+i+"' aria-expanded='true' aria-controls='#collapse-"+i+"'  style='opacity: 0.5;' onclick='$(this).children('.fa').toggleClass('spin90')';>"+
		                        "<p class='col-11'>"+timeStamptoDate(paymentDetails[i].bill_issue, 'month')+", "+ timeStamptoDate(paymentDetails[i].bill_issue, 'year') +"</p><i class='col-1  text-center fa fa-caret-left font-16pt'></i>"+
		                    "</button>"+
		                "</h3>"+
		                "<div id='collapse-"+i+"' class='accordion-collapse collapse lighter' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>"+
		                  "<div class='accordion-body'>"+
		                    "<div class='w-100 d-flex secondary-font'>"+
		                        "<div class='col-7 lh-base'>"+
		                            "<h3 class='pb-2'><b class='fw-bold'>Bill issue day: </b>"+timeStamptoDate(paymentDetails[i].bill_issue)+"</h3>"+
		                            "<h3 class='pb-3'><b class='fw-bold'>Period: </b>"+timeStamptoDate(paymentDetails[i].pay_from)+" - "+timeStamptoDate(paymentDetails[i].pay_to)+"</h3>"+
		                            "<div class='darker d-flex'>"+
		                                "<div class='col-6 d-flex flex-column ps-2 py-2'>"+
		                                    "<p>Hours per session:</p>"+
		                                    "<p>Number of sessions:</p>"+
		                                    "<p>Rate per hours:</p>"+
		                                    "<p>%off:</p>"+
		                                    "<p>Tutoring Supply:</p>"+
		                                    "<br>"+
		                                    "<p class=''><b class='fw-bold'>Total:</b></p>"+
                                    		"<p class=''><b class='fw-bold'>Paid:</b></p>"+
		                                    "<p class='darker py-1'><b class='px-2 fw-bold'>Outstanding:</b></p>"+
		                                "</div>"+
		                                "<div class='col-6 d-flex flex-column align-items-end pe-2 py-2'>"+
		                                    "<p>"+paymentDetails[i].hour_per_session+" hours</p>"+
		                                    "<p>"+paymentDetails[i].number_of_sessions+" sessions</p>"+
		                                    "<p>$"+paymentDetails[i].rate_per_hour+"</p>"+
		                                    "<p>"+paymentDetails[i].percent_off+"%</p>"+
		                                    "<p>"+paymentDetails[i].other_fee+"</p>"+
		                                    "<br>"+
		                                    "<p class='w-100'><b class='fw-bold d-flex justify-content-end'> $"+paymentDetails[i].total+"</b></p>"+
                                    		"<p class='w-100'><b class='fw-bold d-flex justify-content-end'> $"+[Number(paymentDetails[i].paid) + Number(paidSum)]+"</b></p>"+
		                                    "<p class='darker w-100 py-1'><b class='px-2 fw-bold d-flex justify-content-end'> $"+paymentDetails[i].outstanding+"</b></p>"+
		                                "</div>"+
		                            "</div>"+
		                        "</div>"+
		                        "<div class='col-5 d-flex justify-content-center align-items-center'>"+
		                            "<div>"+
		                                "<h3 class='pb-2'><b class='fw-bold'>Sale representative: </b>"+sale_rep.name+"</h3>"+
		                                "<h3 class='pb-2'><b class='fw-bold'>Commissions: </b>"+paymentDetails[i].sale_rep_commission+"</h3>"+
		                                "<h3 class='pb-3'><b class='fw-bold'>Recuring Type: </b>"+paymentDetails[i].recuring_type+"</h3>"+
		                                "<br>"+
		                                "<h3 class='pb-3'><b class='fw-bold'>Package Type: </b>"+paymentDetails[i].package_type+"</h3>"+
		                            "</div>"+
		                        "</div>"+
		                    "</div>"+
		                        "<div id='bill-comments' class='secondary-font w-100 my-4'>"+
		                            "<p class='fw-bold'>Comments:</p>"+
		                            "<p class='p-2'>"+paymentDetails[i].comments+"</p>"+
		                        "</div>"+
		                        "<div class='d-flex align-items-center justify-content-end'>"+
		                            "<u><a href='' class='mx-2 prime-font bg-custom text-custom' onclick='viewPrint("+JSON.stringify(paymentDetails[i].uuid)+")'>View/Print Billing</a></u>"+
		                            "<button type='button' class='mx-2 col-2 btn prime-font btn-custom text-white text-center' onclick='showEditBillForm("+JSON.stringify(paymentDetails[i].uuid)+", "+JSON.stringify('edit')+")'>Edit</button>"+
                            "<button type='button' class='mx-2 col-2 btn prime-font border-custom text-center' onclick='deleteForm("+JSON.stringify(paymentDetails[i].uuid)+")'>Delete</button>"+

		                        "</div>"+
		                  "</div>"+
		                "</div>"+
		            "</div>"
	            );
	        }
        }
}
function showEditBillForm(uuid, action) {
	event.preventDefault();
	if (action == 'create') {
		$('#paid').val('0');
		$('#paid_date').val('');
		$('#bill_issue').val(toDate(today));
		$('#pay_from').val(toDate(today));

		updateBillingInput();
		$('#add-billing-form').append(
		"<div id='bill-actionButton' class='w-50'>"+
		"<button type='button' class='col-2 btn prime-font btn-custom text-white mt-3 mx-1' onclick='createPayment("+JSON.stringify(uuid)+")'>Create</button>"+
		"<button type='button' class='col-2 btn prime-font btn-custom text-white mt-3 mx-1' onclick='clearInput()'>Clear</button>"+
		"</div>"
		)
	}else if (action == 'edit') {
		PaymentDetails(uuid, action);
		$('#add-billing-form').append(
		"<div id='bill-actionButton' class='w-50'>"+
		"<button type='button' class='col-2 btn prime-font btn-custom text-white mt-3 mx-1' onclick='updatePayment("+JSON.stringify(uuid)+")'>Save</button>"+
		"<button type='button' class='col-2 btn prime-font btn-custom text-white mt-3 mx-1' onclick='clearInput()'>Clear</button>"+
		"<button type='button' id='add-refund-btn' class='col-4 btn prime-font btn-custom text-white mt-3 mx-1' onclick='addRefundForm()'>Refund</button>"+
		"</div>"
		)
	}
	$('#add-billing').toggleClass('d-none');
	saleRepList()

}

function addRefundForm(){
	$('#refund-form').toggleClass('d-none');
	$('#refund').val('0');
	updateBillingInput()
}

function editPaymentInfo(paymentInfo){
	if (paymentInfo[0].recuring_type == 'Sessions') {
		$('#sessions-recur').click();
	}else{
		$('#months-recur').click();
	}
	$('#bill_issue').val(toDate(new Date(paymentInfo[0].bill_issue*1000)));
	$('#number_of_months').val(paymentInfo[0].number_of_months);
	$('#pay_from').val(toDate(new Date(paymentInfo[0].pay_from*1000)));
	$('#pay_to').val(toDate(new Date(paymentInfo[0].pay_to*1000)));
	
	$('#number_of_sessions').val(paymentInfo[0].number_of_sessions);
	$('#hour_per_session').val(paymentInfo[0].hour_per_session);

	$('#rate_per_month').val(paymentInfo[0].rate_per_month);
	$('#rate_per_hour').val(paymentInfo[0].rate_per_hour);
	$('#other_fee').val(paymentInfo[0].other_fee);
	$('#total').html(paymentInfo[0].total);

	if (paymentInfo[0].refund.length > 0 && paymentInfo[0].refund !== '0') {
		$('#refund-form').toggleClass('d-none');
		$('#refund').val(paymentInfo[0].refund);
		$('#refund-detail').val(paymentInfo[0].refund_detail);
	}


	$('#paid').val(paymentInfo[0].paid);
	if (paymentInfo[0].deposit !== 'null' && paymentInfo[0].deposit.length > 0) {
		for (var i = JSON.parse(paymentInfo[0].deposit).length - 1; i >= 0; i--) {
		$('div#paid-section').prepend(
			"<div class='d-flex w-100 align-items-center deposit-container' id="+JSON.stringify('deposit-'+paymentInfo[0].uuid+'-'+i)+"'>"+
					"<div class='col-6 form-floating mx-1 mb-3'>"+
						"<input type='text' name='deposit' class='form-control border-0 border-bottom border-2 deposit' placeholder='deposit' onkeyup='updateBillingInput()' value='"+JSON.parse(paymentInfo[0].deposit)[i][0]+"'>"+
						"<label for='deposit' class='bg-custom text-custom ps-0'>Deposit</label>"+
					"</div>"+
					"<div class='col-5 form-floating mx-1 mb-3'>"+
						"<input type='text' name='deposit_date' class='deposit_date form-control border-0 border-bottom border-2' placeholder='deposit_date' value='"+JSON.parse(paymentInfo[0].deposit)[i][1]+"'>"+
						"<label for='deposit_date' class='bg-custom text-custom ps-0'>Deposit Date</label>"+
					"</div>"+
					 "<a href='#' class='prime-font mx-auto col-1'><i class='mx-1 col fa fa-minus font-16pt link-dark' onclick='removeDeposit("+JSON.stringify(paymentInfo[0].uuid+'-'+i)+")'></i></a>"+
			"</div>"
			)
		}
	}
	if (paymentInfo[0].paid_date == null || paymentInfo[0].paid_date == '') {
		$('#paid_date').val(toDate(today));
	}else{
		$('#paid_date').val(toDate(new Date(paymentInfo[0].paid_date*1000)));
	}

	$('#outstanding').html(paymentInfo[0].outstanding);
	$('#sale_rep_id').val(paymentInfo[0].sale_rep_id);
	$('#sale_rep_commission').val(paymentInfo[0].sale_rep_commission);
	$('#package_type input[value = '+ paymentInfo[0].package_type + ']').prop('checked', true);
}
var depositIndex = 0;
function addDeposit() {
	$('#paid_date').val('');
	$('div#paid-section').prepend(
		"<div class='d-flex w-100 align-items-center deposit-container' id='deposit-"+depositIndex+"'>"+
				"<div class='col-6 form-floating mx-1 mb-3'>"+
					"<input type='text' name='deposit' class='form-control border-0 border-bottom border-2 deposit' placeholder='deposit' onkeyup='updateBillingInput()'>"+
					"<label for='deposit' class='bg-custom text-custom ps-0'>Deposit</label>"+
				"</div>"+
				"<div class='col-5 form-floating mx-1 mb-3'>"+
					"<input type='text' name='deposit_date' class='deposit_date form-control border-0 border-bottom border-2' placeholder='deposit_date' value='"+toDate(today)+"'>"+
					"<label for='deposit_date' class='bg-custom text-custom ps-0'>Deposit Date</label>"+
				"</div>"+
				 "<a href='#' class='prime-font mx-auto col-1'><i class='mx-1 col fa fa-minus font-16pt link-dark' onclick='removeDeposit("+depositIndex+")'></i></a>"+
		"</div>"
		)
		$('.deposit_date').datepicker();
	depositIndex = depositIndex+1;
}
function removeDeposit(index){
	$("#deposit-"+index).remove();
	updateBillingInput()
}
function newSaleRepForm(){
	res = getSaleRepList();
	$('#add-salerep').toggleClass('d-none');
  $('.sale-rep-list').empty();
  for (var i = res.length - 1; i >= 0; i--) {
    $('.sale-rep-list').append(
      "<li id='"+res[i].uid+"' class='list-group-item d-flex my-2 justify-content-around border-0 rounded-0 bg-transparent p-0'>"+
        "<div class='col'><h1>"+res[i].name+"</h1></div>"+
        "<div class='col-2 d-flex m-0 d-flex'>"+
      	  "<a href='#' class='text-danger' onclick='deleteSaleRep("+JSON.stringify(res[i].uid)+")'>Delete</a>"+
        "</div>"+
      "</li>"
      )
  }
}
function saleRepList() {
    $('#sale_rep_id').empty();
    $('#sale_rep_id').append(
       "<option value='null' disabled selected hidden>Sale's rep name</option>"
    )
    res = getSaleRepList();
    for (var i = res.length - 1; i >= 0; i--) {
        $('#sale_rep_id').append(
            "<option value='"+res[i].uid+"'>"+res[i].name+"</option>"
        )
    }
}
function logOut() {
	event.preventDefault();
	sessionStorage.removeItem('studentInfo');
	localStorage.removeItem('token');
	localStorage.removeItem('location');
	localStorage.removeItem('home');
	window.location.replace(main);
}