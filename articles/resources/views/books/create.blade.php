@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Sukurti knygą</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<form action="{{route('book.store')}}" method="post"> 
				@csrf

				<div class="form-group">
					<label for="book_title" class="col-form-label">Knygos pavadinimas</label>
					<input type="text" id="book_title" name="book_title" class="form-control">
				</div>
				<div class="form-group">
					<label for="book_description" class="col-form-label">Aprašymas</label>
					<textarea class="form-control" name="book_description">
					</textarea>
				</div>
				<div class="form-group author_select">
					<label for="book_description" class="col-form-label">Autorius</label>
					<select class="form-control" name="book_author_id">
						@foreach($authors as $author)
							<option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="book_newauthor" class="col-form-label">Įtraukti naują autorių</label>
					<input type="checkbox" name="book_newauthor" id="book_newauthor">
				</div>
			
				<div class="author_info d-none">
					<div class="form-group">
						<label for="author_name" class="col-form-label">Autoriaus vardas</label>
						<input type="text" id="author_name" name="author_name" class="form-control">
					</div>	
					<div class="form-group">
						<label for="author_surname" class="col-form-label">Autoriaus pavardė</label>
						<input type="text" id="author_surname" name="author_surname" class="form-control">
					</div>	
					<div class="form-group">
						<label for="author_image_id" class="col-form-label">Autoriaus imageid</label>
						<input type="number" id="author_image_id" name="author_image_id" class="form-control">
					</div>					
				</div>
				<button class="btn btn-success" type="submit">Saugoti</button>
			</form>
		</div>
	</div>
<script>

	$(document).ready(
	
		function(){
			
			$('#book_newauthor').click(
				function(){
					
					$('.author_info').toggleClass('d-none');
					$('.author_select').toggleClass('d-none');
				}
			);
			
			$('#add_field').click(
				function(){
					
					$('.info').append('<div class="vidus">'+$('#liux').html()+'</div>');
				
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
						$('.info').append('<div class="vidus">'+$('#liux').html()+'</div>');
					}
					
				
				}			
			
			)
			console.log('veikia');
			
		}
	
	);
	
	
	
</script>

</div>	
@endsection