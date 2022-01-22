<x-head />

<div class="container">

  <div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Kompanijos tipo duomenys</h5>
	  </div>
	<form action="{{route('companytype.update', [$companyType])}}" method="POST">
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-4">
			<label for="company_type_name" class="col-form-label">Kompanijos tipo pavadinimas</label>
		  </div>
		  <div class="col-6">
			<input type="text" id="company_type_name" name="company_type_name" class="form-control" value="{{$companyType->company_type_name}}">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-4">
			<label for="company_type_short_name" class="col-form-label">Kompanijos tipo trumpinys</label>
		  </div>
		  <div class="col-6">
			<input type="text" id="company_type_short_name" name="company_type_short_name" class="form-control" value="{{$companyType->company_type_short_name}}">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-4">
			<label for="company_type_description" class="col-form-label">Kompanijos aprašymas</label>
		  </div>
		  <div class="col-6">
			<textarea  type="textarea" id="company_type_description" name="company_type_description" class="form-control" rows="4" cols="50">
			{{$companyType->company_type_description}}
			</textarea>
		  </div>
		</div>
	  </div>
	@csrf  
	  <div class="modal-footer">
		<a class="btn btn-secondary" href="{{route('companytype.index')}}">Grįžti</a>
		<button class="btn btn-success" type="submit" name="save_company">Saugoti</button>
	  </div>
	</form>
	</div>
  </div>

</div>

<x-bottom />