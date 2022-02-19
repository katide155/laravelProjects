@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Postai</h2>
		</div>
	</div>
	
		<div class="row">
		<div class="col-12">
			<form action="{{route('post.index')}}" method="get"> 
				@csrf
				
				<input type="hidden" name="sort" value="{{$sort}}">
				<input type="hidden" name="direction" value="{{$direction}}" />
				
				<select name="category_id">
					<option value="all">Pasirinkite kategoriją</option>
					@foreach($categories as $category)
						@if($category_id == $category->id)
							<option value="{{$category->id}}" selected>{{$category->title}}</option>
						@else
							<option value="{{$category->id}}">{{$category->title}}</option>
						@endif
					@endforeach
				</select>
				<select name="pages_in_sheet">
					@foreach ($paginationSettings as $key => $pagin)
						@if($pagin == $pages_in_sheet)
						<option value="{{$pagin}}" selected>{{$key}}</option>
						@else
						<option value="{{$pagin}}">{{$key}}</option>	
						@endif
					@endforeach
				</select>
				<button type="submit">Ieškoti</button>
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
			@if(session()->has('error_message'))
			<div class="alert alert-danger">
				{{session()->get('error_message')}}
			</div>
			@endif			
			@if(count($posts) == 0)
				
			<p>Nėra jokių įrašų</p>
			
			<p><a href="{{route('post.create')}}">Sukurti naują įrašą</a></p>
			
			@else


    @if($pages_in_sheet != 1)
        {!! $posts->appends(Request::except('page'))->render() !!}
    @endif

			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 40px;">@sortablelink('id', 'ID')</th>
				<th style="width: 200px;">@sortablelink('title', 'Pavadinimas')</th>
				<th>@sortablelink('description', 'Aprašymas')</th>
				<th style="width: 200px;">@sortablelink('category_id', 'Kategorija')</th>
				<th style="width: 160px;">
					<a class="btn btn-success" href="{{route('post.create')}}">Pridėti postą</a>
				</th>
			  </tr>
			</thead>
			<tbody>
			
			
			<?php $i=1; ?>
			@foreach ($posts as $post)
			  <tr>
				<td>{{ $i++; }}</td>
				<td>{{$post->id}}</td>
				<td style="text-align: center;">{{$post->title}}</td>
				<td>{{$post->description}}</td>
				<td style="text-align: center;">
					{{$post->postCategory->title}}
				</td>
				<td style="text-align: center;">
					<a class="btn btn-success dbfl" href="{{route('post.edit',[$post])}}">edit</a>
					<div class="dbfl">
					<form method="post" action="{{route('post.destroy',[$post])}}">
						@csrf
						<button type="submit" name="delete_client" class="btn btn-danger"><b>-</b></button>
					</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('post.show',[$post])}}">rod</a>
				</td>
			  </tr>
			  
			@endforeach

			</tbody>
			</table>
			
			@endif

		
	    @if($pages_in_sheet != 1)
        {!! $posts->appends(Request::except('page'))->render() !!}
    @endif		

		</div>
	</div>	
</div>	
@endsection