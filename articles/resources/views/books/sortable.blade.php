
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
			<form action="{{route('book.sortable')}}" method="get"> 
				@csrf
				
				
				<input type="hidden" name="sort" value="{{$sort}}">
				<input type="hidden" name="direction" value="{{$direction}}" />
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
					@foreach ($paginationSettings as $pagin)
						@if($pagin->value == $pages_in_sheet)
						<option value="{{$pagin->value}}" selected>{{$pagin->title}}</option>
						@else
						<option value="{{$pagin->value}}">{{$pagin->title}}</option>	
						@endif
					@endforeach
				</select>
				<button type="submit">Ieškoti</button>
			</form>
			<a href="{{route('book.sortable')}}" class="btn btn-success">išvalyti</a>
		</div>
	</div>
		<div class="col-12">
    @if($pages_in_sheet != 1)
        {!! $books->appends(Request::except('page'))->render() !!}
    @endif
			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 100px;">@sortablelink('id', 'ID')</th>
				<th style="width: 200px;">@sortablelink('title', 'Knygos pavadinimas')</th>
				<th style="width: 300px;">@sortablelink('bookAuthor.name', 'Autoriaus vardas, pavardė')</th>
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
    @if($pages_in_sheet != 1)
        {!! $books->appends(Request::except('page'))->render() !!}
    @endif
		</div>
	</div>	
</div>	
@endsection