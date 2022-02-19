@extends('layouts.app')

@section('content')

<div class="container">

  <div class="modal-dialog big-modal modal-dialog-centered" style="min-width: 1000px">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Redaguoti kategoriją</h5>
	  </div>
	<form action="{{route('category.update',[$category])}}" method="POST">
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-3">
			<label for="category_title" class="col-form-label">Pavadinimas</label>
		  </div>
		  <div class="col-8">
			<input type="text" id="category_title" name="category_title" class="form-control" value="{{$category->title}}">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-3">
			<label for="category_description" class="col-form-label">Aprašymas</label>
		  </div>
		  <div class="col-8">
			<textarea class="form-control" name="category_description">{{$category->description}}</textarea>
		  </div>
		</div>
	  </div>

	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-3">
			<label for="category_visibility" class="col-form-label">Matomumas</label>
		  </div>
		  <div class="col-8">
			<input type="number" min="0" max="1"  name="category_visibility" id="category_visibility" class="form-control" value="{{$category->visibility}}">
		  </div>
		</div>
	  </div>
	  
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-12">Kategorijai priklausantys postai:</div>
				  <div class="col-12">
						@foreach($category->categoryPosts as $post)
							<div class="row g-3 align-items-center">
								<div class="col-1">{{$post->id}}</div>
								<div class="col-2">{{$post->title}}</div>
								<div class="col-7">{{$post->description}}</div>
								<div class="col-1">
									<a class="btn btn-success" href="{{route('post.edit',[$post])}}">Red</a>
								</div>
								<div class="col-1">
									<form method="post" action="{{route('post.destroy', [$post])}}">
										@csrf
										<button class="btn btn-danger" type="submit">Trinti</button>
									</form>	
								</div>
							</div>
						@endforeach
				  </div>
				</div>
			  </div>

			  
			<div class="form-group">
				<label for="category_newpost" class="col-form-label">Pridėti kategorijai postus</label>
				<input type="checkbox" name="category_newpost" id="category_newpost">
			</div>
			<div class="books-info d-none">
				<button type="button" class="btn btn-success" id="add_field">Add</button>
				<button type="button" class="btn btn-danger" id="remove_field">Remove</button>
				<div class="col-md-4">
					<input type="number" id="input_count" class="form-control "/>
					<button type="button" class="btn btn-primary" id="submit_number">ok</button>
				</div>
				<div class="row g-3" id="liux">
					<div class="col-md-4">
						<label for="post_title" class="col-form-label">Posto pavadinimas</label>
						<input type="text" id="post_title" name="post_title[]" class="form-control">
					</div>
					<div class="col-md-4">
						<label for="post_description" class="col-form-label">Aprašymas</label>
						<textarea class="form-control" name="post_description[]" id="post_description"></textarea>
					</div>
					<div class="col-md-4">
						<label for="post_visibility" class="col-form-label">Posto matomumas</label>
						<input type="number" min="0" max="1" id="post_visibility" name="post_visibility[]" class="form-control">
					</div>
				</div>
				
				<div class="info"></div>
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
<script>

	$(document).ready(
		
		function(){
			$('#category_newpost').prop( "checked", false );
			$('#category_newpost').click(
				function(){
					
					$('.books-info').toggleClass('d-none');
					$('.vidus').remove();
					$('#post_title').val('');
					$('#post_description').val('');
					$('#post_visibility').val('');
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