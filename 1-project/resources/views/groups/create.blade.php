<x-head />

<div class="container">


	<form action="{{route('group.store')}}" method="POST">
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="group_title" class="col-form-label">Grupės pavadinimas</label>
		  </div>
		  <div class="col-6">
			<input type="text" id="group_title" name="group_title" class="form-control">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="group_number" class="col-form-label">Grupės numeris</label>
		  </div>
		  <div class="col-6">
			<input type="text" id="group_number" name="group_number" class="form-control">
		  </div>
		</div>
	  </div>

	@csrf  
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary">Uždaryti</button>
		<button class="btn btn-success" type="submit" name="save_group">Saugoti</button>
	  </div>
	</form>


</div>

<x-bottom />