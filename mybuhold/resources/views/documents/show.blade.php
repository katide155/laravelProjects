<x-head />


<div class="container">


  <div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Kompanijos duomenys</h5>
	  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Pavadinimas:</div>
				  <div class="col-6">{{$company->company_name}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Tipas:</div>
				  <div class="col-6">{{$company->company_type}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Aprašymas:</div>
				  <div class="col-6">{{$company->company_description}}</div>
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