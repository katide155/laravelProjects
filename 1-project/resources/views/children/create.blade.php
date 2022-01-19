<x-head />

<div class="container">

  <div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Vaiko duomenys</h5>
	  </div>
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
					@foreach ($groups as $group)
						<option value="{{$group->id}}">{{$group->group_title}}</option>
					@endforeach
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
		<a class="btn btn-secondary" href="{{route('child.index')}}">Grįžti</a>
		<button class="btn btn-success" type="submit" name="save_child">Saugoti</button>
	  </div>
	</form>
	
				<script>
			function pop_up(url){
				window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=500,width=1000,height=600", true); 
			}
			</script>
</div>
</div>
</div>

<x-bottom />