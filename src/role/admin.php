<div class="h-100 darker">

<?php
	include 'src/forms/removeLocationPrompt.php';
	include 'src/component/navigation.php';
	include 'src/forms/addLocation.php';
	include 'src/forms/editLocation.php';
?>

<div class="d-flex flex-column justify-content-center">
<div class="w-100 row m-0 justify-content-center bg-white">
	<div class="col-6 row mx-0 my-3">
		<div class="form-floating col">
			<input type="text" placeholder="Enter Location Name" class="filter-input form-control border-0 border-bottom border-2 col me-5" id="floatingInput">
			<label for="floatingInput" class="bg-custom text-custom font-16pt secondary-font">Enter Location Name<i class="fa fa-search ms-5"></i></label>
		</div>
		<button type="button" class="col-2 btn prime-font w-25 mx-auto btn-custom text-white scalex09" onclick="document.getElementById('add-location').classList.toggle('d-none');">Add New Location</button>
	</div>
</div>

<div class="row m-0 justify-content-center w-100 py-5 h-100">
	<img src onerror='locationList()'>
	<ul id='locaiton-list' class="col-6 list-group overflow-auto vh-custom secondary-font lighter radius-25 p-3">
	</ul>
</div>
</div>
</div>

<script>
	window.onload = function() {
		if (!localStorage.getItem('token')){
			alert('Please login first!')
			localStorage.clear()
			window.location.replace(main);
		}
	}
</script>