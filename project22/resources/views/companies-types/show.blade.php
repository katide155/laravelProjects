<x-head />


<div class="container">


  <div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Kompanijos tipų duomenys</h5>
	  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Pavadinimas:</div>
				  <div class="col-6">{{$companyType->company_type_name}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Trumpinys:</div>
				  <div class="col-6">{{$companyType->company_type_short_name}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Aprašymas:</div>
				  <div class="col-6">{{$companyType->company_type_description}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Kompanijos klientai:</div>
				  <div class="col-6">
						@foreach($companyType->companyTypeCompanies as $company)
							<div>{{$company->id}}
								{{$company->company_name}}
							<form method="post" action="{{route('company.destroy', [$company])}}">
					@csrf
					<button class="btn btn-danger" type="submit">Trinti</button>
				</form>	
							</div>
						@endforeach
				  </div>
				</div>
			  </div>	
			<div class="modal-footer">
	 
				<a class="btn btn-secondary" href="{{route('companytype.index')}}">Grįžti</a>
				
			    <form method="post" action="{{route('companytype.destroy', [$companyType])}}">
					@csrf
					<button class="btn btn-danger" type="submit">Trinti</button>
				</form>
				<a class="btn btn-success" href="{{route('companytype.edit',[$companyType])}}">Redaguoti</a>
			</div>
	</div>
  </div>

</div>

<x-bottom />