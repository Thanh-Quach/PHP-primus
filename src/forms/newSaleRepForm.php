<div id='add-salerep' class="position-absolute w-100 h-100 top-0 shadow-overlay d-flex justify-content-center align-items-center d-none">
	<div class="bg-white rounded position-relative">
	<span class="close ms-auto me-3 my-3" onclick="document.getElementById('add-salerep').classList.toggle('d-none');"><i class="fa fa-times"></i></span>
		<div id='add-salerep-form' class="m-5">
		<div class="d-flex">
			<div class="form-floating">
				<input type="text" placeholder="Enter Salerep Name" class=" form-control border-0 border-bottom border-2 col me-5" id="salerepInput">
				<label for="salerepInput" class="bg-custom text-custom font-16pt secondary-font">Enter Salerep Name</label>
			</div>
			<button type="button" class="btn prime-font mx-auto btn-custom text-white mt-3" onclick="addSaleRep()">Add</button>
		</div>
		<ul class="sale-rep-list overflow-auto darker mt-3 p-2" style="max-height: 500px;"></ul>
		</div>
	</div>
</div>