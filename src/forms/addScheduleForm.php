<div id='add-schedule' class="position-absolute w-100 h-100 top-0 shadow-overlay d-flex justify-content-center align-items-center d-none">
	<div class="bg-white rounded position-relative">
	<span class="close ms-auto me-3 my-3" onclick="document.getElementById('add-schedule').classList.toggle('d-none');"><i class="fa fa-times"></i></span>
		<div id='add-schedule-form' class="m-5">
		<div class="w-100">
			<label><h3 class="prime-font mb-3 font-16pt">Choose the days and times</h3></label>
			<div class="d-flex w-100 justify-content-around">
				<input type="hidden" id='uuid'>
				<div id='schedule-list' class="w-100">
					<div class="mb-3 d-flex justify-content-around w-100">
						<input type="text" placeholder="E.g: Mon" class="mx-1 secondary-font form-control border-0 border-bottom border-2 col date-input">
						<input type="text" placeholder="E.g: 12:30-2:00" class="mx-1 secondary-font form-control border-0 border-bottom border-2 col time-input">
						<a href='#' id='add-date' class="prime-font mx-auto"><i class="mx-1 col fa fa-plus font-16pt link-dark" onclick="moreSchedule()"></i></a>
					</div>
				</div>
			</div>
		</div>
		<button type="button" class="col-5 btn prime-font mx-auto btn-custom text-white mt-3" onclick="addSchedule()">Save</button>
		</div>
	</div>
</div>