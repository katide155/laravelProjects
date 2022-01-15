<x-head />


<div class="container">


  <div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Kliento duomenys</h5>
	  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Vardas:</div>
				  <div class="col-6">{{$client->client_name}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Pavardė:</div>
				  <div class="col-6">{{$client->client_surname}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Naudotojo vardas:</div>
				  <div class="col-6">{{$client->client_username}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Kompanija:</div>
					<div class="col-6">
					@foreach ($companies as $company)
						@if($client->client_company_id == $company->id)
							{{$company->company_name}}
						@endif
					@endforeach
					</div>
				</div>
			  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Nuotraukos kelias:</div>
				  <div class="col-6">{{$client->client_image_url}}</div>
				</div>
			  </div>

	
			<div class="modal-footer">
	 
				<a class="btn btn-secondary" href="{{route('client.index')}}">Grįžti</a>
				
			    <form method="post" action="{{route('client.destroy', [$client])}}">
					@csrf
					<button class="btn btn-danger" type="submit">Trinti</button>
				</form>
				<a class="btn btn-success" href="{{route('client.edit',[$client])}}">Redaguoti</a>
			</div>
	</div>
  </div>

</div>

<x-bottom />