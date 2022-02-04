@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Knygų sąrašas</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-6">
				<form action="{{route('book.index')}}" method="get"> 
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
		<form action="{{route('book.filter')}}" method="get"> 
				@csrf
				<select name="author_id">
					@foreach($authors as $author)
					<option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
					@endforeach
				</select>
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
				<th style="width: 200px;">Knygos pavadinimas</th>
				<th style="width: 200px;">Autoriaus vardas, pavardė</th>
				<th style="width: 200px;">Knygos aprašymas</th>
				<th><a class="btn btn-success dbfl" href="{{route('book.create')}}">Sukurti autorių</a></th>
			  </tr>
			</thead>
			<tbody>
			<?php $i=1; ?>
			@foreach ($books as $book)
			  <tr>
				<td>{{ $i++; }}</td>
				<td>{{$book->id}}</td>
				<td style="text-align: left;">{{$book->title}}</td>
				<td>{{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</td>
				<td>{{$book->description}}</td>
				<td style="text-align: right;">
					<a class="btn btn-success dbfl" href="{{route('book.edit',[$book])}}">edit</a>
					<div class="dbfl">
					<form method="post" action="{{route('book.destroy',[$book])}}">
						@csrf
						<button type="submit" name="delete_type" class="btn btn-danger"><b>-</b></button>
					</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('book.show',[$book])}}">rod</a>
				</td>
				
			  </tr>
			  
			@endforeach
				</tbody>
			</table>

		</div>
	</div>	
</div>	
@endsection