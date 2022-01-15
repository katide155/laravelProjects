<x-head />

<div class="container">
  <div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Kliento duomenys</h5>
	  </div>
			<form action="{{route('client.update', [$client])}}" method="POST">
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-3">
					<label for="client_name" class="col-form-label">Vardas</label>
				  </div>
				  <div class="col-9">
					<input type="text" id="client_name" name="client_name" class="form-control" value="{{$client->client_name}}">
				  </div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-3">
					<label for="client_surname" class="col-form-label">Pavardė</label>
				  </div>
				  <div class="col-9">
					<input type="text" id="client_surname" name="client_surname" class="form-control" value="{{$client->client_surname}}">
				  </div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">
					<label for="client_username" class="col-form-label">Naudotojo vardas</label>
				  </div>
				  <div class="col-8">
					<input type="text" id="client_username" name="client_username" class="form-control" value="{{$client->client_username}}">
				  </div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-3">
					<label for="client_company_id" class="col-form-label">Kompanija</label>
				  </div>
					<div class="col-5">
						<?php $selected = 'selected'; ?>
						<select class="form-select" aria-label=".form-select-sm example" name="client_company_id">
							@foreach ($companies as $company)
								@if($company->id == $client->client_company_id)
									<?php $selected = null; ?>
								@endif
									<option <?php echo $selected; ?> value="{{$company->id}}">{{$company->company_name}}</option>
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
				  <div class="col-4">
					<label for="client_image_url" class="col-form-label">Nuotraukos kelias</label>
				  </div>
				  <div class="col-8">
					<input type="text" id="client_image_url" name="client_image_url" class="form-control" value="{{$client->client_image_url}}">
				  </div>
				</div>
			  </div>

			@csrf  
			  <div class="modal-footer">
				<a class="btn btn-secondary" href="{{route('client.index')}}">Grįžti</a>
				<button class="btn btn-success" type="submit" name="save_child">Saugoti</button>
			  </div>
			</form>
	</div>
  </div>
			<script>
			function pop_up(url){
				window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=500,width=1000,height=600", true); 
			}
			</script>

</div>

<x-bottom />