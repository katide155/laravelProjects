@extends('layouts.app')

@section('content')

<div class="container">

  <div class="modal-dialog big-modal modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Kategorijos duomenys</h5>
	  </div>
	<form action="{{route('category.update',[$productCategory])}}" method="POST">
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-4">
			<label for="title" class="col-form-label">Pavadinimas</label>
		  </div>
		  <div class="col-8">
			<input type="text" id="title" name="title" class="form-control" value="{{$productCategory->title}}">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-4">
			<label for="description" class="col-form-label">Aprašymas</label>
		  </div>
		  <div class="col-8">
			<textarea type="textarea" id="description" name="description" class="form-control">{{$productCategory->description}}</textarea>
		  </div>
		</div>
	  </div>


	@csrf  
	  <div class="modal-footer">
		<a class="btn btn-secondary" href="{{route('category.index')}}">Grįžti</a>
		<button class="btn btn-success" type="submit" name="save_group">Saugoti</button>
	  </div>
	</form>
	</div>
  </div>

</div>

@endsection