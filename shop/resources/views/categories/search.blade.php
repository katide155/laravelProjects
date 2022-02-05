@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Kategorijų sąrašas</h2>
		</div>
	</div>

	<div class="row">
	
		<div class="col-12">

			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 40px;">ID</th>
				<th style="width: 200px;">Kategorijos pavadinimas</th>
				<th>Kategorijos aprašymas</th>
				<th><a class="btn btn-success dbfl" href="{{route('category.create')}}">Sukurti kategoriją</a></th>
			  </tr>
			</thead>
			<tbody>
			<?php $i=1; ?>
			@foreach ($categories as $category)
			  <tr>
				<td>{{ $i++; }}</td>
				<td>{{$category->id}}</td>
				<td style="text-align: left;">{{$category->title}}</td>
				<td>{{$category->description}}</td>
				<td style="text-align: right;">
					<a class="btn btn-success dbfl" href="{{route('category.edit',[$category])}}">edit</a>
					<div class="dbfl">
					<form method="post" action="{{route('category.destroy',[$category])}}">
						@csrf
						<button type="submit" name="delete_type" class="btn btn-danger"><b>-</b></button>
					</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('category.show',[$category])}}">rod</a>
				</td>
				
			  </tr>
			  
			@endforeach
				</tbody>
			</table>

		</div>
	</div>	
</div>	
@endsection