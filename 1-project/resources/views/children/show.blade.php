<x-head />

<div class="container">

  <div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Vaiko duomenys</h5>
	  </div>

	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-5">Vardas:</div>
		  <div class="col-6">{{$child->child_name}}</div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-5">Pavardė:</div>
		  <div class="col-6">{{$child->child_surname}}</div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-5">Grupė:</div>
		  <div class="col-6">				
			@foreach ($groups as $group)
				@if($child->child_group_id == $group->id)
					{{$group->group_title}}
				@endif
			@endforeach
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-5">Tevų e. pašto adresas:</div>
		  <div class="col-6">{{$child->child_parents_email}}</div>
		</div>
	  </div>
	<div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-5">Tėvų telefono numeris:</div>
		  <div class="col-6">{{$child->child_parents_telno}}</div>
		</div>
	</div>
	<div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-5">Vaiko gimimo diena:</div>
		  <div class="col-6">{{$child->child_birthdate}}</div>
		</div>
	</div>
	
	<div class="modal-footer">

		<a class="btn btn-secondary" href="{{route('child.index')}}">Grįžti</a>
		
		<form method="post" action="{{route('child.destroy', [$child])}}">
			@csrf
			<button class="btn btn-danger" type="submit">Trinti</button>
		</form>
		<a class="btn btn-success" href="{{route('child.edit',[$child])}}">Redaguoti</a>
	</div>

</div>
</div>
</div>
<x-bottom />