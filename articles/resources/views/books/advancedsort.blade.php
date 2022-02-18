@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Knygų sąrašas</h2>
		</div>
	</div>


	<div class="row">
		<div class="row">
		<div class="col-12">
		{{--<form action="{{route('book.sortfilter')}}" method="get"> 
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
				<select name="author_id">
					<option value="all">Pasirinkite autorių</option>
					@foreach($authors as $author)
						@if($author_id == $author->id)
							<option value="{{$author->id}}" selected>{{$author->name}} {{$author->surname}}</option>
						@else
							<option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
						@endif
					@endforeach
				</select>
				<select name="pages_in_sheet">
					@foreach ($pagination as $pagin)
						@if($pagin->value == $pages_in_sheet)
						<option value="{{$pagin->value}}" selected>{{$pagin->title}}</option>
						@else
						<option value="{{$pagin->value}}">{{$pagin->title}}</option>	
						@endif
					@endforeach
				</select>
				<button type="submit">Ieškoti</button>
			</form>
			<a href="{{route('book.sortfilter')}}" class="btn btn-success">išvalyti</a>
		--}}
		</div>
	</div>
		<div class="col-12">
		
			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 40px;">ID</th>
				<th style="width: 100px;">Knygos pavadinimas</th>
				<th style="width: 150px;">Autoriaus vardas, pavardė</th>
				<th >Knygos aprašymas</th>
				{{--<th><a class="btn btn-success dbfl" href="{{route('book.create')}}">Sukurti autorių</a></th>--}}
			  </tr>
			</thead>
			<tbody>
			<?php $i=1; ?>
			@foreach ($books as $book)
			  <tr>
				<td>{{ $i++; }}</td>
				<td>{{$book->id}}</td>
				<td style="text-align: left;">{{$book->title}}</td>
				<td>{{$book->name}} {{$book->surname}}</td>
				<td>{{$book->description}}</td>
					{{--<td style="text-align: right;">
					<a class="btn btn-success dbfl" href="{{route('book.edit',[$book])}}">edit</a>
					<div class="dbfl">
					<form method="post" action="{{route('book.destroy',[$book])}}">
						@csrf
						<button type="submit" name="delete_type" class="btn btn-danger"><b>-</b></button>
					</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('book.show',[$book])}}">rod</a>
					</td>--}}
			  </tr>
			  
			@endforeach
				</tbody>
			</table>

		</div>
	</div>	
</div>	
@endsection