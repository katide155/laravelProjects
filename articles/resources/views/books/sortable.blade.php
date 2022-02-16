
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

		</div>
	</div>
		<div class="col-12">
		{!! $books->appends(Request::except('page'))->render() !!}
			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 100px;">@sortablelink('id', 'ID')</th>
				<th style="width: 200px;">@sortablelink('title', 'Knygos pavadinimas')</th>
				<th style="width: 300px;">@sortablelink('author_id', 'Autoriaus vardas, pavardė')</th>
				<th >@sortablelink('description', 'Knygos aprašymas')</th>
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
				<td>{{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</td>
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
			
			{!! $books->appends(Request::except('page'))->render() !!}
		</div>
	</div>	
</div>	
@endsection