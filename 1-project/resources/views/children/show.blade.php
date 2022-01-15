<x-head />
<h1>show</h1>

<div class="container">



	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">Vardas</div>
		  <div class="col-6">{{$child->child_name}}</div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">Pavardė</div>
		  <div class="col-6">{{$child->child_surname}}</div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">Grupė</div>
		  <div class="col-6">{{$child->child_group_id}}</div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-5">Tevų e. pašto adresas</div>
		  <div class="col-7">{{$child->child_parents_email}}</div>
		</div>
	  </div>
	<div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-5">Tėvų telefono numeris</div>
		  <div class="col-7">{{$child->child_parents_telno}}</div>
		</div>
	</div>
	<div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-5">Vaiko gimimo diena</div>
		  <div class="col-7">{{$child->child_birthdate}}</div>
		</div>
	</div>
		<a class="btn btn-success" href="{{route('child.edit',[$child])}}">edit</a>
		<!--<button type="button" class="btn btn-success" data-bs-id="1" data-bs-toggle="modal" data-bs-target="#exampleModal">red</button>-->
		<form method="post" action="{{route('child.destroy',[$child])}}">
			@csrf
			<button type="submit" name="delete_child" class="btn btn-danger"><b>-</b></button>
		</form>
</div>

<x-bottom />