<x-head />

<div class="container">

  <div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Kompanijos duomenys</h5>
	  </div>
	<form action="{{route('company.store')}}" method="POST">
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-4">
			<label for="company_name" class="col-form-label">Kompanijos pavadinimas</label>
		  </div>
		  <div class="col-6">
			<input type="text" id="company_name" name="company_name" class="form-control">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-4">
			<label for="company_type" class="col-form-label">Kompanijos tipas</label>
		  </div>
		  <div class="col-6">
			<select class="form-select" aria-label=".form-select-sm example" name="company_type_id">
			@foreach ($companiesTypes as $companyType)
				<option value="{{$companyType->id}}">{{$companyType->company_type_name}}</option>
			@endforeach
			</select>
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-4">
			<label for="company_description" class="col-form-label">Kompanijos aprašymas</label>
		  </div>
		  <div class="col-6">
			<input type="textarea" id="company_description" name="company_description" class="form-control">
		  </div>
		</div>
	  </div>
	@csrf  
	  <div class="modal-footer">
		<a class="btn btn-secondary" href="{{route('company.index')}}">Grįžti</a>
		<button class="btn btn-success" type="submit" name="save_group">Saugoti</button>
	  </div>
	</form>
	</div>
  </div>

</div>

<x-bottom />