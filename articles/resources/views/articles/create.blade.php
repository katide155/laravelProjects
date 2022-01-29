@extends('layouts.app')

@section('content')

<div class="container">
  <div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Straipsnis</h5>
	  </div>
			<form action="{{route('article.store')}}" method="POST">
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-3">
					<label for="article_title" class="col-form-label">Pavadinimas</label>
				  </div>
				  <div class="col-9">
					<input type="text" id="article_title" name="article_title" class="form-control" >
				  </div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-3">
					<label for="excerpt" class="col-form-label">Ištrauka</label>
				  </div>
				  <div class="col-9">
					<input type="text" id="excerpt" name="excerpt" class="form-control" >
				  </div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">
					<label for="description" class="col-form-label">Straipsnis</label>
				  </div>
				  <div class="col-10">
					<textarea type="textarea" id="description" name="description" class="form-control"></textarea>
				  </div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-3">
					<label for="student_attendance_group_id" class="col-form-label">Autorius</label>
				  </div>
					<div class="col-5">
						<select class="form-select" aria-label=".form-select-sm example" name="author_id">
							@foreach ($authors as $author)
								<option value="{{$author->id}}">{{$author->name}} {{$author->surname}} </option>
							@endforeach
						</select>
					</div>
				  <div class="col-4">
					<button class="btn btn-success" type="button" name="" onclick="pop_up('{{route('author.create')}}')">Įvesti naują</button>
				  </div>
				</div>
			  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">
					<label for="article_image" class="col-form-label">Paveikslėlis</label>
				  </div>
				  <div class="col-8">
					<input type="file" id="article_image" name="article_image" class="form-control" >
				  </div>
				</div>
			  </div>

			@csrf  
			  <div class="modal-footer">
				<a class="btn btn-secondary" href="{{route('article.index')}}">Grįžti</a>
				<button class="btn btn-success" type="submit" name="save_client">Saugoti</button>
			  </div>
			</form>
	</div>
  </div>
			<script>
			function pop_up(url){
				window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=500,width=1000,height=600", true); 
			}
			</script>
</div>

@endsection