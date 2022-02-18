@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Staripsniai</h2>
		</div>
	</div>
	<div class="row">
		
		<div class="col-12">
		
			@if(session()->has('success_message'))
				<div class="alert alert-success">
					{{session()->get('success_message')}}
				</div>
			@endif
			
			@if(count($articles) == 0)
				
			<p>Nėra jokių įrašų</p>
			
			<p><a href="{{route('article.create')}}">Sukurti naują įrašą</a></p>
			
			@else

			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 200px;">Pavadinimas</th>
				<th>Ištrauka</th>
				<th style="width: 200px;">Aprašymas</th>
				<th style="width: 200px;">Autorius</th>
				<th style="width: 200px;">Nuotrauka</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			
			
			<?php $i=1; ?>
			@foreach ($articles as $article)
			  <tr>
				<td>{{ $i++; }}</td>
				<td style="text-align: center;">{{$article->title}}</td>
				<td style="text-align: center;">{{$article->excerpt}}</td>
				<td style="text-align: center;">{{$article->description}}</td>
				<td style="text-align: center;">{{$article->author_id}}</td>
				<td style="text-align: center;">
					<img width="80px" height="30px" src="{{$article->article_image_id}}"/>
				</td>
				<td style="text-align: center;">
					<a class="btn btn-success dbfl" href="{{route('article.edit',[$article])}}">edit</a>
					<div class="dbfl">
					<form method="post" action="{{route('article.destroy',[$article])}}">
						@csrf
						<button type="submit" name="delete_client" class="btn btn-danger"><b>-</b></button>
					</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('article.show',[$article])}}">rod</a>
				</td>
			  </tr>
			  
			@endforeach

			</tbody>
			</table>
			
			@endif


		</div>
	</div>	
</div>	
@endsection