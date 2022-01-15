<x-head />

<div class="container">


	<form action="{{route('child.store')}}" method="POST">
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="name" class="col-form-label">Vardas</label>
		  </div>
		  <div class="col-6">
			<input type="text" id="name" name="child_name" class="form-control" aria-describedby="passwordHelpInline">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="surname" class="col-form-label">Pavardė</label>
		  </div>
		  <div class="col-6">
			<input type="text" id="surname" name="child_surname" class="form-control" aria-describedby="passwordHelpInline">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="group" class="col-form-label">Grupė</label>
		  </div>
			<div class="col-6">
				<select class="form-select" aria-label=".form-select-sm example" name="child_group_id">
					<option selected value="0">Grupės pavadinimas</option>
					<option selected value="1">Nykstukai</option>
					<option selected value="2">Pelėdžiukai</option>
					<option selected value="3">Giliukai</option>
				</select>
			</div>
		  <div class="col-4">
			<button class="btn btn-success" type="button" name="" onclick="pop_up('{{route('group.create')}}')">Įvesti naują</button>
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-5">
			<label for="parents_email" class="col-form-label">Tevų e. pašto adresas</label>
		  </div>
		  <div class="col-7">
			<input type="email" id="parents_email" name="child_parents_email" class="form-control" aria-describedby="passwordHelpInline">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-5">
			<label for="parents_telno" class="col-form-label">Tėvų telefono numeris</label>
		  </div>
		  <div class="col-7">
			<input type="text" id="parents_telno" name="child_parents_telno" class="form-control" aria-describedby="passwordHelpInline">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-5">
			<label for="child_birthdate" class="col-form-label">Vaiko gimimo diena</label>
		  </div>
		  <div class="col-7">
			<input type="text" id="child_birthdate" name="child_birthdate" class="form-control" aria-describedby="passwordHelpInline">
		  </div>
		</div>
	  </div>
	@csrf  
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Uždaryti</button>
		<button class="btn btn-success" type="submit" name="save_child">Saugoti</button>
	  </div>
	</form>


</div>

<x-bottom />