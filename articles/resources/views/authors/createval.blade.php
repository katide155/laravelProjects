@extends('layouts.app')

@section('content')



<div class="container">

  <div class="modal-dialog big-modal modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Autoriaus duomenys</h5>
	  </div>
	  
	<div class="errors">
		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>
						{{$error}}
					</li>
				@endforeach
				</ul>
			</div>
		@endif
	</div>
	<form action="{{route('author.storeval')}}" method="POST" enctype="multipart/form-data">
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-3">
			<label for="name" class="col-form-label">Vardas</label>
		  </div>
		  <div class="col-6">
			<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
		  
		  
		  
		@error('name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
		</div></div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-md-3">
			<label for="surname" class="col-form-label">Pavardė</label>
		  </div>
		  <div class="col-md-6">
			<input type="text" id="surname" name="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname') }}">
		  
			@error('surname')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror	  
		  </div>
		</div>
	  </div>

 
	  
		<div class="row mb-3">
			<label for="image_alt" class="col-md-4 col-form-label text-md-end">Image Alt</label>

			<div class="col-md-6">
				<input id="image_alt" type="text" class="form-control" name="image_alt"  autofocus >

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
				<input id="image_width" min="0" max="200" step="10" type="number" class="form-control" name="image_width"  autofocus >

			</div>
		</div>

		<div class="row mb-3">
			<label for="image_height" class="col-md-4 col-form-label text-md-end">Image Height</label>

			<div class="col-md-6">
				<input id="image_height" min="0" max="200" step="10" type="number" class="form-control" name="image_height"  autofocus >

			</div>
		</div>

		<div class="row mb-3">
			<label for="image_class" class="col-md-4 col-form-label text-md-end">Image Class</label>

			<div class="col-md-6">
				<input id="image_class" type="text" class="form-control" name="image_class"  autofocus >
			</div>
		</div>	
			<div class="form-group">
				<label for="author_newbook" class="col-form-label">Pridėti autoriaus knygų</label>
				<input type="checkbox" name="author_newbook" id="author_newbook">
			</div>
			<div class="books-info d-none">
				<button type="button" class="btn btn-success" id="add_field">Add</button>
				<button type="button" class="btn btn-danger" id="remove_field">Remove</button>
				<input type="number" class="form-control" name="input_count" id="input_count"/>
				<button type="button" class="btn btn-success" id="submit_number">Prideti</button>
				<div class="row g-3" id="liux">
					<div class="col-md-6">
						<label for="book_title" class="col-form-label">Knygos pavadinimas</label>
						<input type="text" id="book_title" name="book_title[]" class="form-control @error('book_title'.$i) is-invalid @enderror" value="{{ old('book_title'.$i) }}">
						@error('book_title'.$i)
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="col-md-6">
						<label for="book_description" class="col-form-label">Aprašymas</label>
						<textarea class="form-control @error('book_description'.$i) is-invalid @enderror" name="book_description[]" id="book_description">{{ old('book_title'.$i) }}</textarea>
						@error('surname')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
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