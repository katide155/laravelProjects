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
			<div class="form-group">
				<label for="author_newbook" class="col-form-label">Pridėti autoriaus knygų</label>
				<input type="checkbox" name="author_newbook" id="author_newbook">
			</div>
			<div class="books-info d-none">
				<button class="btn btn-success" id="add_field">Add</button>
				<button class="btn btn-danger" id="remove_field">Remove</button>
				<div class="row g-3" id="liux">
					<div class="col-md-6">
						<label for="book_title" class="col-form-label">Knygos pavadinimas</label>
						<input type="text" id="book_title" name="book_title[]" class="form-control">
					</div>
					<div class="col-md-6">
						<label for="book_description" class="col-form-label">Aprašymas</label>
						<textarea class="form-control" name="book_description[]" id="book_description"></textarea>
					</div>
				</div>
				
				<div class="info"></div>
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
<script>

	$(document).ready(
		
		function(){
			$('#author_newbook').prop( "checked", false );
			$('#author_newbook').click(
				function(){
					
					$('.books-info').toggleClass('d-none');
					$('.vidus').remove();
					$('#book_title').val('');
					$('#book_description').val('');
				}
			);
			
			$('#add_field').click(
				function(){
					
					$('.info').append('<div class="vidus row g-3">'+$('#liux').html()+'</div>');
				
				}
			);		
			
			$('#remove_field').click(
				function(){
					
					$('.vidus:last-child').remove();
				
				}
			);	

			$('#submit_number').click(
				function(){
					
					let input_count;
					input_count = $('#input_count').val();
					
					for(let i=0; i<input_count; i++){
						$('.info').append('<div class="vidus row g-3">'+$('#liux').html()+'</div>');
					}
					
				
				}			
			
			)
			console.log('veikia');
			
		}
	
	);
	
	
	
</script>
@endsection