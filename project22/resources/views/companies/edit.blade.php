<x-head />

<div class="container">

  <div class="modal-dialog big-modal modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Kompanijos duomenys</h5>
	  </div>
	<form action="{{route('company.update', [$company])}}" method="POST">
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="company_name" class="col-form-label">Kompanijos pavadinimas</label>
		  </div>
		  <div class="col-10">
			<input type="text" id="company_name" name="company_name" class="form-control" value="{{$company->company_name}}">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="company_type" class="col-form-label">Kompanijos tipas</label>
		  </div>
		  <div class="col-10">
			<select class="form-select" aria-label=".form-select-sm example" name="company_type_id">
				@foreach ($companiesTypes as $companyType)
					<?php $selected = null; ?>
					@if($companyType->id == $company->company_type_id)
						<?php $selected = 'selected'; ?>
					@endif
						<option <?php echo $selected; ?> value="{{$companyType->id}}">{{$companyType->company_type_name}}</option>
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
		  <div class="col-10">
			<textarea id="summernote" type="textarea" id="company_description" name="company_description" class="form-control" rows="4" cols="50">
			{{$company->company_description}}
			</textarea>
		  </div>
		</div>
	  </div>
	@csrf  
	  <div class="modal-footer">
		<a class="btn btn-secondary" href="{{route('company.index')}}">Grįžti</a>
		<button class="btn btn-success" type="submit" name="save_company">Saugoti</button>
	  </div>
	</form>
	</div>
  </div>

</div>

<script>
	$(document).ready(function() {
  $('#summernote').summernote();
});
</script>

<x-bottom />