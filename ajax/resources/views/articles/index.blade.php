@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Article list</h2>
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
				<th style="width: 200px;">Article title</th>
				<th >Article description</th>
				<th style="width: 200px;">Article type</th>
				<th style="width: 180px;">
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Pridėti kompaniją</button>
				</th>
			  </tr>
			</thead>
			<tbody>
			<?php $i=1; ?>
			@foreach ($articles as $article)
			  <tr>
				<td>{{ $i++; }}</td>
				<td style="text-align: left;">{{$article->type}}</td>
				<td style="text-align: left;">{{$article->description}}</td>
				<td style="text-align: left;">{{$article->articleType->title}}</td>
				
				<td style="text-align: right;">
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
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Kompanijos duomenys</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						<form action="{{route('article.store')}}" method="POST">
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-2">
								<label for="company_name" class="col-form-label">Kompanijos pavadinimas</label>
							  </div>
							  <div class="col-6">
								<input type="text" id="company_name" name="company_name" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-2">
								<label for="company_type" class="col-form-label">Kompanijos tipas</label>
							  </div>
							  <div class="col-6">
								<select class="form-select" aria-label=".form-select-sm example" name="company_type_id">
								@foreach ($articleTypes as $articleType)
									<option value="{{$articleType->id}}">{{$articleType->title}}</option>
								@endforeach
								</select>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-2">
								<label for="company_description" class="col-form-label">Kompanijos aprašymas</label>
							  </div>
							  <div class="col-6">
								<input type="textarea" id="company_description" name="company_description" class="form-control">
							  </div>
							</div>
						  </div>
						@csrf  
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary">Uždaryti</button>
							<button class="btn btn-success" type="submit" name="save_group">Saugoti</button>
						  </div>
						</form>
					</div>
				  </div>
				</div>
		
			<script>
			function pop_up(url){
				window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=500,width=1000,height=600", true); 
			}
			</script>


		</div>
	</div>	
</div>	
@endsection