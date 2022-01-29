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
	  
	  
		<div class="row mb-3">
			<label for="image_alt" class="col-md-4 col-form-label text-md-end">Image Alt</label>

			<div class="col-md-6">
				<input id="image_alt" type="text" class="form-control" name="image_alt" required autofocus >

			</div>
		</div>

		<div class="row mb-3">
			<label for="image_src" class="col-md-4 col-form-label text-md-end">Image Src</label>

			<div class="col-md-6">
				<input id="image_src" type="file" class="form-control" name="image_src" >

			</div>
		</div>

		<div class="row mb-3">
			<label for="image_width" class="col-md-4 col-form-label text-md-end">Image Width</label>

			<div class="col-md-6">
				<input id="image_width" min="0" max="200" step="10" type="number" class="form-control" name="image_width" required autofocus >

			</div>
		</div>

		<div class="row mb-3">
			<label for="image_height" class="col-md-4 col-form-label text-md-end">Image Height</label>

			<div class="col-md-6">
				<input id="image_height" min="0" max="200" step="10" type="number" class="form-control" name="image_height" required autofocus >

			</div>
		</div>

		<div class="row mb-3">
			<label for="image_class" class="col-md-4 col-form-label text-md-end">Image Class</label>

			<div class="col-md-6">
				<input id="image_class" type="text" class="form-control" name="image_class" required autofocus >
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