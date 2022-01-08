<div id='edit-location' class="position-absolute w-100 h-100 shadow-overlay row m-0 top-0 justify-content-center align-items-center d-none">
	<div class="bg-white col-5 rounded position-relative">
	<span class="close ms-auto me-3 my-3" onclick="document.getElementById('edit-location').classList.toggle('d-none');"><i class="fa fa-times"></i></span>
		<div id='edit-location-form' class="m-5">
		<div class="form-floating">
			<h3 id="edit-location-name" class="prime-font font-16pt mb-3 text-center">Location Name</h3>
			<input type="hidden" id="edit-location-uid">
				<div class="row">
					<div class="form-floating col">
						<input type="email" placeholder="email" class=" col form-control border-0 border-bottom border-2 col me-5" id="new-operator">
						<label for="new-operator" class="bg-custom text-custom secondary-font">Enter new operator email</label>
					</div>
					<div class="form-floating col">
						<input type="password" placeholder="password" class=" col form-control border-0 border-bottom border-2 col me-5" id="new-operator-pw">
						<label for="new-operator-pw" class="bg-custom text-custom secondary-font">Enter new operator password</label>
					</div>
					<button type="button" class=" col-2 btn prime-font mx-auto btn-custom text-white scalex09" onclick="addOperator()">Add</button>
				</div>
			<ul id="accessible-operator" class="darker list-group overflow-auto secondary-font radius-25 p-3 mt-3">

			</ul>
		</div>
		</div>
	</div>
</div>