<x-head />


<div class="container">


  <div class="modal-dialog big-modal modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Kompanijos duomenys</h5>
	  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Pavadinimas:</div>
				  <div class="col-10">{{$company->company_name}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Tipas:</div>
				  <div class="col-10">{{$company->companyType->company_type_name}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Aprašymas:</div>
				  <div class="col-10">{{$company->company_description}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Kompanijos klientai:</div>
				  <div class="col-10">
						@foreach($company->companyClients as $client)
							<div class="row g-3 align-items-center">
								<div class="col-1">{{$client->id}}</div>
								<div class="col-2">{{$client->client_name}}</div>
								<div class="col-2">{{$client->client_surname}}</div>
								<div class="col-2">
								<img width="80px" height="30px" src="{{$client->client_image_url}}"/>
								</div>
								<div class="col-2">
								<form method="post" action="{{route('client.destroy', [$client])}}">
									@csrf
									<button class="btn btn-danger" type="submit">Trinti</button>
								</form>	
								</div>
							</div>
						@endforeach
				  </div>
				</div>
			  </div>	
			<div class="modal-footer">
	 
				<a class="btn btn-secondary" href="{{route('company.index')}}">Grįžti</a>
				
			    <form method="post" action="{{route('company.destroy', [$company])}}">
					@csrf
					<button class="btn btn-danger" type="submit">Trinti</button>
				</form>
				<a class="btn btn-success" href="{{route('company.edit',[$company])}}">Redaguoti</a>
			</div>
	</div>
  </div>

</div>

<x-bottom />