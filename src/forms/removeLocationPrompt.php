<div id='remove-location' class="position-absolute w-100 h-100 shadow-overlay d-flex justify-content-center align-items-center d-none">
	<div class="bg-white rounded position-relative w-25">
	<span class="close ms-auto me-3 my-3" onclick="document.getElementById('remove-location').classList.toggle('d-none');"><i class="fa fa-times"></i></span>
		<div id='remove-location-form' class="m-5">
		<div class="form-floating">
			<h3 class="prime-font font-16pt mb-3 text-center lh-base">Are you sure you want to remove the following and all the students inside?</h3>
			<input id='remove-location-name' type="hidden" name="name">
			<input id='remove-uid' type="hidden" name="uid">	
			<div class="w-100 row justify-content-center p-2">
				<button type="button" class="btn prime-font mx-auto btn-custom text-white pt-1 col-5" onclick="removeLocation()">Yes</button>
				<button type="button" class="btn prime-font mx-auto btn-custom text-white pt-1 col-5" onclick="document.getElementById('remove-location').classList.toggle('d-none');">No</button>
			</div>
			</div>
		</div>
	</div>
</div>