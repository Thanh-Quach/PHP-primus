<div id='add-location' class="position-absolute w-100 h-100 top-0 shadow-overlay d-flex justify-content-center align-items-center d-none">
	<div class="bg-white rounded position-relative">
	<span class="close ms-auto me-3 my-3" onclick="document.getElementById('add-location').classList.toggle('d-none');"><i class="fa fa-times"></i></span>
		<div id='add-location-form' class="m-5">
		<div class="form-floating">
			<input type="text" placeholder="Enter Location Name" class=" form-control border-0 border-bottom border-2 col me-5" id="LocationInput">
			<label for="LocationInput" class="bg-custom text-custom font-16pt secondary-font">Enter Location Name</label>
			<button type="button" class="btn prime-font mx-auto btn-custom text-white mt-3" onclick="addLocation()">Add New Location</button>
		</div>
		</div>
	</div>
</div>