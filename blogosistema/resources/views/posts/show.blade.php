@extends('layouts.app')

@section('content')


<div class="container">


  <div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Postas</h5>
	  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Pavadinimas:</div>
				  <div class="col-6">{{$post->title}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Description:</div>
				  <div class="col-6">{{$post->description}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Kategorija:</div>
					<div class="col-6">
						{{$postCategory}}
					</div>
				</div>
			  </div>

	
			<div class="modal-footer">
	 
				<a class="btn btn-secondary" href="{{route('post.index')}}">Grįžti</a>
				
			    <form method="post" action="{{route('post.destroy', [$post])}}">
					@csrf
					<button class="btn btn-danger" type="submit">Trinti</button>
				</form>
				<a class="btn btn-success" href="{{route('post.edit',[$post])}}">Redaguoti</a>
			</div>
	</div>
  </div>

</div>

@endsection