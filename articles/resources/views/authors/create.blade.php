@extends('layouts.app')

@section('content')

<div class="container">

  <div class="modal-dialog big-modal modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Autoriaus duomenys</h5>
	  </div>
	<form action="{{route('author.store')}}" method="POST" enctype="multipart/form-data">
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="name" class="col-form-label">Vardas</label>
		  </div>
		  <div class="col-4">
			<input type="text" id="name" name="name" class="form-control">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="surname" class="col-form-label">Pavardė</label>
		  </div>
		  <div class="col-4">
			<input type="text" id="surname" name="surname" class="form-control">
		  </div>
		</div>
	  </div>

	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="author_image" class="col-form-label">Autoriaus nuotrauka</label>
		  </div>
		  <div class="col-10">
			<input type="file" name="author_image" placeholder="Pasirinkite foto" id="author_image">
		  </div>
		</div>
	  </div>
	@csrf  
	  <div class="modal-footer">
		<a class="btn btn-secondary" href="{{route('author.index')}}">Grįžti</a>
		<button class="btn btn-success" type="submit" name="save_group">Saugoti</button>
	  </div>
	</form>
	</div>
  </div>

</div>

@endsection