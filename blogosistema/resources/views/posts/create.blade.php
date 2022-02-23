@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Sukurti postą</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<form action="{{route('post.store')}}" method="post"> 
				@csrf
				  @if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
				<div class="form-group">
					<label for="post_title" class="col-form-label">Posto pavadinimas</label>
					<input type="text" id="post_title" name="post_title" class="form-control">
				</div>
				<div class="form-group">
					<label for="post_description" class="col-form-label">Aprašymas</label>
					<textarea class="form-control" name="post_description"></textarea>
				</div>
				<div class="form-group">
					<label for="post_visibility" class="col-form-label">Posto matomumas</label>
					<input type="number" min="0" max="1" id="post_visibility" name="post_visibility" class="form-control">
				</div>
				<div class="form-group cat_select">
					<label for="post_category_id" class="col-form-label">Kategorija</label>
					<select class="form-select" name="post_category_id">
						@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->title}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="post_newcategory" class="col-form-label">Įtraukti naują kategoriją</label>
					<input type="checkbox" name="post_newcategory" id="post_newcategory">
				</div>
			
				<div class="category_info d-none">
					<div class="form-group">
						<label for="category_title" class="col-form-label">Kategorijos pavadinimas</label>
						<input type="text" id="category_title" name="category_title" class="form-control">
					</div>	
					<div class="form-group">
						<label for="category_description" class="col-form-label">Kategorijos aprašymas</label>
						<textarea class="form-control" id="category_description" name="category_description"></textarea>
					</div>	
					<div class="form-group">
						<label for="category_visibility" class="col-form-label">Kategorijos matomumas</label>
						<input type="number" min="0" max="1" id="category_visibility" name="category_visibility" class="form-control">
					</div>					
				</div>
				<button class="btn btn-success" type="submit">Saugoti</button>
			</form>
		</div>
	</div>
<script>

	$(document).ready(
	
		function(){
			$('#post_newcategory').prop( "checked", false );
			$('#post_newcategory').click(
				function(){
					
					$('.category_info').toggleClass('d-none');
					$('.cat_select').toggleClass('d-none');
				}
			);
	
		}
	
	);
	
	
	
</script>

</div>	

@endsection