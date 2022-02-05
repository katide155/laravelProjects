@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Kategorijų sąrašas</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-6">
				<form action="{{route('category.index')}}" method="get"> 
				@csrf
				<select name="sortCol">
					@foreach($selectArray as $key=>$item)
						@if($item == $sortCol || (empty($sortCol) && $key==0))
						<option value="{{$item}}" selected>{{$item}}</option>
						@else
						<option value="{{$item}}">{{$item}}</option>
						@endif
					@endforeach
				</select>
				<select name="sortOrd">
					@if ($sortOrd == 'asc' || empty($sortOrd))
					<option value="asc" selected>Didėjimo</option>
					<option value="desc">Mažėjimo</option>
					@else
					<option value="asc">Didėjimo</option>
					<option value="desc" selected>Mažėjimo</option>
					@endif
				</select>
				<button type="submit">Rikiuoti</button>
			</form>
		</div>
		<div class="col-6">
			<form action="{{route('category.search')}}" method="get"> 
				@csrf
				<input type="text" name="search_key" placeholder="Ieškoma frazė..."/>
				<button type="submit">Ieškoti</button>
			</form>
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