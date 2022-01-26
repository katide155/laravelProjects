@extends('layouts.app')

@section('content')

<div class="container">

  <div class="modal-dialog big-modal modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Mokyklos duomenys</h5>
	  </div>
	<form action="{{route('school.store')}}" method="POST">
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="school_name" class="col-form-label">Mokyklos pavadinimas</label>
		  </div>
		  <div class="col-4">
			<input type="text" id="school_name" name="school_name" class="form-control">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="school_place" class="col-form-label">Mokyklos adresas</label>
		  </div>
		  <div class="col-4">
			<input type="text" id="school_place" name="school_place" class="form-control">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="school_phone" class="col-form-label">Mokyklos tel. Nr.</label>
		  </div>
		  <div class="col-4">
			<input type="text" id="school_phone" name="school_phone" class="form-control">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="school_description" class="col-form-label">Mokyklos aprašymas</label>
		  </div>
		  <div class="col-10">
			<textarea type="textarea" id="school_description" name="school_description" class="form-control"></textarea>
		  </div>
		</div>
	  </div>
	@csrf  
	  <div class="modal-footer">
		<a class="btn btn-secondary" href="{{route('school.index')}}">Grįžti</a>
		<button class="btn btn-success" type="submit" name="save_group">Saugoti</button>
	  </div>
	</form>
	</div>
  </div>

</div>

@endsection