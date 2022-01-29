@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Autorių sąrašas</h2>
		</div>
	</div>
	
	@if(session()->has('error_message'))
		<div class="alert alert-danger">
			{{session()->get('error_message')}}
		</div>
	@endif
	@if(session()->has('success_message'))
		<div class="alert alert-success">
			{{session()->get('success_message')}}
		</div>
	@endif
	<div class="row">
		
		<div class="col-12">


			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 200px;">Autoriaus vardas, pavardė</th>
				<th style="width: 200px;">Autoriaus foto</th>
			  </tr>
			</thead>
			<tbody>
			<?php $i=1; ?>
			@foreach ($authors as $author)
			  <tr>
				<td>{{ $i++; }}</td>
				<td style="text-align: left;">{{$author->name}} {{$author->surname}}</td>
				<td>
					<img src="{{'/images/author-images/'.$author->authorImage->src}}" width="{{$author->authorImage->width}}" height="{{$author->authorImage->height}}" alt="{{$author->authorImage->alt}}"/>
				</td>
				<td style="text-align: right;">
					<a class="btn btn-success dbfl" href="{{route('author.edit',[$author])}}">edit</a>
					<div class="dbfl">
					<form method="post" action="{{route('author.destroy',[$author])}}">
						@csrf
						<button type="submit" name="delete_type" class="btn btn-danger"><b>-</b></button>
					</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('author.show',[$author])}}">rod</a>
				</td>
				
			  </tr>
			  
			@endforeach



		</div>
	</div>	
</div>	
@endsection