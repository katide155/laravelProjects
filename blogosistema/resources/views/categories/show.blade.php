@extends('layouts.app')

@section('content')


<div class="container">


  <div class="modal-dialog big-modal modal-dialog-centered" style="min-width: 900px">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Kategorijos duomenys</h5>
	  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Pavadinimas:</div>
				  <div class="col-10">{{$category->title}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">aprašymas:</div>
				  <div class="col-10">{{$category->description}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Matomumas:</div>
				  <div class="col-10">{{$category->visibility}}</div>
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

			<div class="modal-footer">
	 
				<a class="btn btn-secondary" href="{{route('category.index')}}">Grįžti</a>
				
			    <form method="post" action="{{route('category.destroy', [$category])}}">
					@csrf
					<button class="btn btn-danger" type="submit">Trinti</button>
				</form>
				<a class="btn btn-success" href="{{route('category.edit',[$category])}}">Redaguoti</a>
			</div>
	</div>
  </div>

</div>

@endsection