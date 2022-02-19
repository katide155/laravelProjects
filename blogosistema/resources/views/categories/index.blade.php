@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Kategorijos</h2>
		</div>
	</div>
	
		<div class="row">
		<div class="col-12">
			<form action="{{route('category.index')}}" method="get"> 
			
			
			    <input type="hidden" name="sort" value="{{$sort}}">
				<input type="hidden" name="direction" value="{{$direction}}" />
				
				@csrf
				<select name="pages_in_sheet">
					@foreach ($paginationSettings as $key => $pagin)
						@if($pagin == $pages_in_sheet)
						<option value="{{$pagin}}" selected>{{$key}}</option>
						@else
						<option value="{{$pagin}}">{{$key}}</option>	
						@endif
					@endforeach
				</select>
				<button type="submit">Pasirinkti</button>
			</form>
			<a href="{{route('post.index')}}" class="btn btn-success">išvalyti</a>
		</div>
	</div>
	<div class="row">
		
		<div class="col-12">
		
			@if(session()->has('success_message'))
				<div class="alert alert-success">
					{{session()->get('success_message')}}
				</div>
			@endif
			
			@if(count($categories) == 0)
				
			<p>Nėra jokių įrašų</p>
			
			<p><a href="{{route('category.create')}}">Sukurti naują įrašą</a></p>
			
			@else


    @if($pages_in_sheet != 1)
        {!! $categories->appends(Request::except('page'))->render() !!}
    @endif

			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 40px;">@sortablelink('id', 'ID')</th>
				<th style="width: 200px;">@sortablelink('title', 'Pavadinimas')</th>
				<th>@sortablelink('description', 'Aprašymas')</th>
				<th style="width: 160px;">
					<a class="btn btn-success" href="{{route('category.create')}}">Pridėti kategoriją</a>
				</th>
			  </tr>
			</thead>
			<tbody>
			
			
			<?php $i=1; ?>
			@foreach ($categories as $category)
			  <tr>
				<td>{{ $i++; }}</td>
				<td>{{$category->id}}</td>
				<td style="text-align: center;">{{$category->title}}</td>
				<td>{{$category->description}}</td>
				<td style="text-align: center;">
					<a class="btn btn-success dbfl" href="{{route('category.edit',[$category])}}">edit</a>
					<div class="dbfl">
					<form method="post" action="{{route('category.destroy',[$category])}}">
						@csrf
						<button type="submit" name="delete_client" class="btn btn-danger"><b>-</b></button>
					</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('category.show',[$category])}}">rod</a>
				</td>
			  </tr>
			  
			@endforeach

			</tbody>
			</table>
			
			@endif

		
	    @if($pages_in_sheet != 1)
        {!! $categories->appends(Request::except('page'))->render() !!}
    @endif		

		</div>
	</div>	
</div>	
@endsection