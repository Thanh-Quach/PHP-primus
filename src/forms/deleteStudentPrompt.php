<div id='delete-student' class="position-absolute w-100 h-100 shadow-overlay d-flex justify-content-center align-items-center d-none">
	<div class="bg-white rounded position-relative w-50">
	<span class="close ms-auto me-3 my-3" onclick="$('#delete-student').toggleClass('d-none');"><i class="fa fa-times"></i></span>
		<div id='delete-student-form' class="m-5">
		<div class="form-floating">
			<h3 class="prime-font font-16pt mb-3 text-center lh-base">Are you sure you want to remove the current student and all the bill payments?</h3>	
			<div class="w-100 row justify-content-center p-2">
				<button type="button" class="btn prime-font mx-auto btn-custom text-white pt-1 col-5" onclick="deleteUser()">Yes</button>
				<button type="button" class="btn prime-font mx-auto btn-custom text-white pt-1 col-5" onclick="$('#delete-student').toggleClass('d-none');">No</button>
			</div>
			</div>
		</div>
	</div>
</div>