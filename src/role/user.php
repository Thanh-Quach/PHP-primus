<div class="h-100 darker position-relative overflow-auto">
<?php 
	include 'src/component/navigation.php';
	include 'src/forms/addScheduleForm.php';
	include 'src/forms/billingForm.php';
	include 'src/forms/addStudent.php';
	include 'src/forms/newSaleRepForm.php';
	include 'src/forms/deleteStudentPrompt.php';



?>
<div class="w-100 row m-0 justify-content-center bg-white">
	<div class="col-8 row mx-auto my-3 position-relative">
		<div class="form-floating col">
			<input autocomplete="off" type="text" placeholder="Enter Location Name" class="filter-input form-control border-0 border-bottom border-2 col me-5" id="floatingInput" onkeyup="inputFilter('student')">
			<label for="floatingInput" class="bg-custom text-custom font-16pt secondary-font">Enter Students Name or Phone Number<i class="fa fa-search ms-5"></i></label>
		</div>
		<ul class="filter-list position-absolute student-list col-5 list-group p-0 overflow-auto d-none" style="top: 60px; max-height: 500px; background-color: white; z-index: 200;">
			<img src onerror="studentsList()">
		</ul>
		<div class="col-5 d-flex">
			<button type="button" class="btn prime-font btn-custom text-white scalex09 col-6" onclick="document.getElementById('users-register').classList.toggle('d-none');">New Register</button>
			<button type="button" class="btn prime-font btn-custom text-white scalex09 col-6" onclick="newSaleRepForm()">New Sale Rep</button>
		</div>
	</div>
</div>
<div id='users-container' class="w-100 row m-0 px-3 pt-5 justify-content-center">
	<div id='users-info' class="col-6 m-0">
		<button class="on-event-click col-12 border-0 py-2 prime-font bg-custom text-white d-flex m-0 justify-content-around align-items-center caret-spin" type="button" data-bs-toggle="collapse" data-bs-target="#students-info" aria-expanded="false" aria-controls="students-info">
	   	<h3 class="col-11">Student's info</h3><i class="font-16pt fa fa-caret-left spin90"></i>
	  	</button>
		<div id='students-info' class="collapse show lighter w-100">
			<h1 class="w-100 text-center py-3">Please Select a Student to view</h1>
		</div>

		<button class="col-12 border-0 py-2 prime-font bg-custom text-white d-flex m-0 justify-content-around align-items-center caret-spin" type="button" data-bs-toggle="collapse" data-bs-target="#guardian-contacts" aria-expanded="false" aria-controls="guardian-contacts">
	   	<h3 class="col-11">Contact</h3><i class="font-16pt fa fa-caret-left"></i>
	  	</button>
		<div id="guardian-contacts" class="collapse lighter w-100">
			<h1 class="w-100 text-center py-3">Please Select a Student to view</h1>
		</div>

		<button class="on-event-click col-12 border-0 py-2 prime-font bg-custom text-white d-flex m-0 justify-content-around align-items-center caret-spin" type="button" data-bs-toggle="collapse" data-bs-target="#students-schedule" aria-expanded="false" aria-controls="students-schedule">
	    <h3 class="col-11">Student Schedule</h3><i class="font-16pt fa fa-caret-left"></i>
	  	</button>
		<div id='students-schedule' class="collapse lighter w-100 p-2 secondary-font lh-base">
			<h1 class="w-100 text-center py-3">Please Select a Student to view</h1>
		</div>

		<div class="col-12 p-0 mt-4">
			<button type="button" class="btn prime-font col-3 mx-auto btn-custom text-white text-center" onclick="editStudentInfo('edit')">Edit</button>
			<button type="button" class="btn prime-font col-3 mx-auto btn-custom text-white text-center">Disable</button>
			<button type="button" class="btn prime-font col-3 mx-auto border-custom text-center" onclick="$('#delete-student').toggleClass('d-none');">Delete User</button>
		</div>
	</div>
	<div id='payment-info' class="col-6">
			<!-- bill -->
			
			<!-- bill -->	
	</div>
</div>
</div>