<x-head />
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Klientų sąrašas</h2>
		</div>
	</div>
	<div class="row">
		
		<div class="col-12">
			
			@if(count($clients) == 0)
				
			<p>Nėra jokių įrašų</p>
			
			<p><a href="{{route('client.create')}}">Sukurti naują įrašą</a></p>
			
			@else

			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 200px;">Vardas</th>
				<th>Pavardė</th>
				<th style="width: 200px;">Naudotojo vardas</th>
				<th style="width: 200px;">Kompanijos pavadinimas</th>
				<th style="width: 200px;">Nuotrauka</th>
				<th style="width: 160px;">
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Pridėti klientą</button>
				</th>
			  </tr>
			</thead>
			<tbody>
			
			
			<?php $i=1; ?>
			@foreach ($clients as $client)
			  <tr>
				<td>{{ $i++; }}</td>
				<td style="text-align: left;">{{$client->client_name}}</td>
				<td style="text-align: left;">{{$client->client_surname}}</td>
				<td style="text-align: right;">{{$client->client_username}}</td>
				<td style="text-align: right;">
				@foreach ($companies as $company)
					@if($client->client_company_id == $company->id)
						{{$company->company_name}}
					@endif
				@endforeach
				</td>
				<td style="text-align: right;">{{$client->client_image_url}}</td>
				<td style="text-align: right;">
					<a class="btn btn-success dbfl" href="{{route('client.edit',[$client])}}">edit</a>
					<div class="dbfl">
					<form method="post" action="{{route('client.destroy',[$client])}}">
						@csrf
						<button type="submit" name="delete_client" class="btn btn-danger"><b>-</b></button>
					</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('client.show',[$client])}}">rod</a>
				</td>
			  </tr>
			  
			@endforeach

			</tbody>
			</table>
			
			@endif
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Kliento duomenys</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
							<form action="{{route('client.store')}}" method="POST">
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-2">
									<label for="client_name" class="col-form-label">Vardas</label>
								  </div>
								  <div class="col-6">
									<input type="text" id="client_name" name="client_name" class="form-control">
								  </div>
								</div>
							  </div>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-2">
									<label for="client_surname" class="col-form-label">Pavardė</label>
								  </div>
								  <div class="col-6">
									<input type="text" id="client_surname" name="client_surname" class="form-control">
								  </div>
								</div>
							  </div>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-5">
									<label for="client_username" class="col-form-label">Naudotojo vardas</label>
								  </div>
								  <div class="col-7">
									<input type="text" id="client_username" name="client_username" class="form-control">
								  </div>
								</div>
							  </div>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-2">
									<label for="client_company_id" class="col-form-label">Kompanija</label>
								  </div>
									<div class="col-6">
										<select class="form-select" aria-label=".form-select-sm example" name="client_company_id">
											@foreach ($companies as $company)
											<option selected value="{{$company->id}}">{{$company->company_name}}</option>
											@endforeach
										</select>
									</div>
								  <div class="col-4">
									<button class="btn btn-success" type="button" name="" onclick="pop_up('{{route('company.create')}}')">Įvesti naują</button>
								  </div>
								</div>
							  </div>

							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-5">
									<label for="client_image_url" class="col-form-label">Nuotraukos kelias</label>
								  </div>
								  <div class="col-7">
									<input type="text" id="client_image_url" name="client_image_url" class="form-control">
								  </div>
								</div>
							  </div>

							@csrf  
							  <div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Uždaryti</button>
								<button class="btn btn-success" type="submit" name="save_child">Saugoti</button>
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