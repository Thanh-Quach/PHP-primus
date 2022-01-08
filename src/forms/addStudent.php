<div id='users-register' class="position-absolute w-100 h-100 top-0 shadow-overlay row m-0 justify-content-center align-items-center d-none">
	<div class="bg-white rounded position-relative col-10 h-75 p-0">
	<span style="right: 0;" class="close position-absolute m-3" onclick="closeRegForm();"><i class="fa fa-times"></i></span>
		<div id='users-register-form' class="m-0 secondary-font row h-100 p-3">
			<div id='student-side' class="col-6 p-3 h-100 overflow-auto">
				<h3 class="prime-font mb-3">Student's Info</h3>
		        <div class="form-floating mx-1 mb-3">
		            <input type="text" name='reg-date' class="form-control border-0 border-bottom border-2 datepicker w-50" id="reg-date" placeholder="reg-date">
		            <label for="reg-date" class="bg-custom text-custom ps-0">Registered Date</label>
		        </div>
		        <div class="d-flex mb-3 w-100">
		          <div class="form-floating mx-1 w-50">
		            <input type="text" name='firstname' class="form-control border-0 border-bottom border-2" id="firstname" placeholder="firstname">
		            <label for="firstname" class="bg-custom text-custom ps-0">First name</label>
		          </div>
		          <div class="form-floating mx-1 w-50">
		            <input type="text" name='lastname' class="form-control border-0 border-bottom border-2" id="lastname" placeholder="lastname">
		            <label for="lastname" class="bg-custom text-custom ps-0">Last name</label>
		          </div>
		      	</div>
		        <div class="d-flex mb-3 w-100">
		          <div class="form-floating mx-1 w-50">
		            <input type="text" name='phone' class="form-control border-0 border-bottom border-2" id="phone" placeholder="phone">
		            <label for="phone" class="bg-custom text-custom ps-0">Phone</label>
		          </div>
		          <div class="form-floating mx-1 w-50">
		            <input type="text" name='email' class="form-control border-0 border-bottom border-2" id="email" placeholder="email">
		            <label for="email" class="bg-custom text-custom ps-0">Email</label>
		          </div>
		      	</div>

		      	<div class="row mb-3 justify-content-center">
		          <div class="form-floating mx-1 col-4">
					  <select class="form-select border-0 border-bottom border-2" id="gender">
					    <option selected value="M">Male</option>
					    <option value="F">Female</option>
					  </select>
					  <label class="bg-custom text-custom ps-0" for="gender">Gender</label>
				  </div>
		          <div class="form-floating mx-1 col">
					  <select class="form-select border-0 border-bottom border-2" id="ethnicity">
					    <option selected value="Vietnamese">Vietnamese</option>
					    <option value="Chinese">Chinese</option>
					    <option value="Philipino">Philipino</option>
					    <option value="South African">South African</option>
					    <option value="Indian">Indian</option>
					    <option value="Caucasian">Caucasian</option>
					    <option value="Other">Other</option> 
					  </select>
					  <label class="bg-custom text-custom ps-0" for="ethnicity">Ethnicity</label>
				  </div>
		          <div class="form-floating mx-1 col-3">
					  <select class="form-select border-0 border-bottom border-2" id="grade">
					  	<option selected value="1">1</option>
					  	<?php
					  		for ($i=2; $i < 13; $i++) { 
					  			echo '<option value="'.$i.'">'.$i.'</option>';
					  		};
					  	?>
					  </select>
					  <label class="bg-custom text-custom ps-0" for="grade">Grade</label>
				  </div>
		        </div>
		          <div class="form-floating mb-3">
		            <input type="text" name='school' class="form-control border-0 border-bottom border-2" id="school" placeholder="school">
		            <label for="school" class="bg-custom text-custom ps-0">School</label>
		          </div>
		          <div class="form-floating mb-3">
		            <input type="text" name='address' class="form-control border-0 border-bottom border-2" id="address" placeholder="address">
		            <label for="address" class="bg-custom text-custom ps-0">Address</label>
		          </div>
		          <div class="mb-3" id='subjects'>
		          	<label class="bg-custom text-custom ps-0 mb-3">Subjects</label>
		          	<div class="d-flex align-items-center justify-content-around">
			            <div class="form-check">
						  <input class="form-check-input mt-0" type="checkbox" value="Math">
						  <label class="form-check-label" for="flexCheckDefault">
						    Math
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input mt-0" type="checkbox" value="English">
						  <label class="form-check-label" for="flexCheckChecked">
						    English
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input mt-0" type="checkbox" value="Science">
						  <label class="form-check-label" for="flexCheckChecked">
						    Science
						  </label>
						</div>
						<div class="form-check">
						  <input id='other-sub' class="form-check-input mt-0" type="checkbox">
						  <label class="form-check-label" for="flexCheckChecked">
						    <input id='other-sub-value' type="text" name="" placeholder="Others" class='form-control border-0 border-bottom border-2 p-0'>
						  </label>
						</div>
					</div>
		          </div>
		          <div class="form-floating mb-3">
		            <input type="text" name='hear-from' class="form-control border-0 border-bottom border-2" id="hear-from" placeholder="hear-from">
		            <label for="hear-from" class="bg-custom text-custom ps-0">How did you hear?</label>
		          </div>
			</div>
			<div class="col-6 p-3 h-100 overflow-auto">
			<div id='parent-side' class="w-100">
				<h3 class="prime-font mb-3">Parents/Guardians</h3>
				<div class="d-flex mb-3 w-100">
		          <div class="form-floating mx-1 w-50">
		            <input type="text" name='rel-1' class="form-control border-0 border-bottom border-2" id="rel-1" placeholder="rel-1">
		            <label for="rel-1" class="bg-custom text-custom ps-0">Relation</label>
		          </div>
		          <div class="form-floating mx-1 w-50">
		            <input type="text" name='rel-1-fullname' class="form-control border-0 border-bottom border-2" id="rel-1-fullname" placeholder="rel-1-fullname">
		            <label for="rel-1-fullname" class="bg-custom text-custom ps-0">Full Name</label>
		          </div>
		      	</div>
		        <div class="d-flex mb-3 w-100">
		          <div class="form-floating mx-1 w-50">
		            <input type="text" name='rel-1-phone' class="form-control border-0 border-bottom border-2" id="rel-1-phone" placeholder="rel-1-phone">
		            <label for="rel-1-phone" class="bg-custom text-custom ps-0">Cell phone</label>
		          </div>
		          <div class="form-floating mx-1 w-50">
		            <input type="email" name='rel-1-email' class="form-control border-0 border-bottom border-2" id="rel-1-email" placeholder="rel-1-email">
		            <label for="rel-1-email" class="bg-custom text-custom ps-0">Home phone</label>
		          </div>
		      	</div>
		      </div>
		      <button id='addButton' class='btn prime-font col-3 mx-auto btn-custom text-white text-center' onclick="addContact()">Add Contact</button>
		      <button id='removeButton' class='btn prime-font col-3 mx-auto btn-custom text-white text-center d-none' onclick="removeContact()">Remove Contact</button>
		      <div id='control-button' class="mt-5">
			      <button id='register-btn' class='btn prime-font col-3 mx-auto btn-custom text-white text-center' onclick="registerStudent()">Create</button>
			      <button class='btn prime-font col-3 mx-auto btn-custom text-white text-center' onclick="clearInput()">Clear</button>
			      <button class='btn prime-font col-3 mx-auto border-custom text-center' onclick="closeRegForm();">Cancel</button>
			  </div>
		      </div>
		</div>
	</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWpJUo3sffq0vMamMNw7VzBGsF3d3aoc0&libraries=places&callback=initMap&channel=GMPSB_addressselection_v1_cA" async defer></script>