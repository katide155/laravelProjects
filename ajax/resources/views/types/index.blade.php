<x-head />
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Kompanijų sąrašas</h2>
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
				<th style="width: 200px;">Kompanijos tipo pavadinimas</th>
				<th style="width: 200px;">Kompanijos tipo trumpinys</th>
				<th >Kompanijos tipo aprašymas</th>
				<th >Kompanijų kiekis</th>
				<th style="width: 180px;">
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Pridėti kompanijos tipą</button>
				</th>
			  </tr>
			</thead>
			<tbody>
			<?php $i=1; ?>
			@foreach ($companiesTypes as $companyType)
			  <tr>
				<td>{{ $i++; }}</td>
				<td style="text-align: left;">{{$companyType->company_type_name}}</td>
				<td style="text-align: left;">{{$companyType->company_type_short_name}}</td>
				<td style="text-align: left;">{{$companyType->company_type_description}}</td>
				<td>{{count($companyType->companyTypeCompanies)}}</td>
				<td style="text-align: right;">
					<a class="btn btn-success dbfl" href="{{route('companytype.edit',[$companyType])}}">edit</a>
					<div class="dbfl">
					<form method="post" action="{{route('companytype.destroy',[$companyType])}}">
						@csrf
						<button type="submit" name="delete_type" class="btn btn-danger"><b>-</b></button>
					</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('companytype.show',[$companyType])}}">rod</a>
				</td>
			  </tr>
			  
			@endforeach

			</tbody>
			</table>
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Kompanijos tipo duomenys</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						<form action="{{route('companytype.store')}}" method="POST">
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-2">
								<label for="company_type_name" class="col-form-label">Kompanijos tipo pavadinimas</label>
							  </div>
							  <div class="col-6">
								<input type="text" id="company_type_name" name="company_type_name" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-2">
								<label for="company_type_short_name" class="col-form-label">Kompanijos tipo trumpinys</label>
							  </div>
							  <div class="col-6">
								<input type="text" id="company_type_short_name" name="company_type_short_name" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-2">
								<label for="company_type_description" class="col-form-label">Kompanijos tipo aprašymas</label>
							  </div>
							  <div class="col-6">
								<input type="textarea" id="company_type_description" name="company_type_description" class="form-control">
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
<x-bottom />