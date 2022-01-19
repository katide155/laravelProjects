<x-head />
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Vaikų sąrašas</h2>
		</div>
	</div>
	<div class="row">
		
		<div class="col-12">
			
			@if(count($children) == 0)
				
			<p>Nėra jokių įrašų</p>
			
			<p><a href="{{route('child.create')}}">Sukurti naują įrašą</a></p>
			
			@else

			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 200px;">Vardas</th>
				<th>Pavardė</th>
				<th style="width: 200px;">Grupės pavadinimas</th>
				<th style="width: 200px;">Tėvų e. pašto adresas</th>
				<th style="width: 200px;">Tėvų tel. Nr.</th>
				<th style="width: 200px;">Vaiko gimimo diena</th>
				<th style="width: 180px;">
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Pridėti vaiką</button>
				</th>
			  </tr>
			</thead>
			<tbody>
			
			
			<?php $i=1; ?>
			@foreach ($children as $child)
			  <tr>
				<td>{{ $i++; }}</td>
				<td style="text-align: left;">{{$child->child_name}}</td>
				<td style="text-align: left;">{{$child->child_surname}}</td>
				
				<td style="text-align: right;">
				@foreach ($groups as $group)
					@if($child->child_group_id == $group->id)
						{{$group->group_title}}
					@endif
				@endforeach
				</td>
				
				<td style="text-align: right;">{{$child->child_parents_email}}</td>
				<td style="text-align: right;">{{$child->child_parents_telno}}</td>
				<td style="text-align: right;">{{$child->child_birthdate}}</td>
				<td style="text-align: right;">
					<a class="btn btn-success dbfl" href="{{route('child.edit',[$child])}}">edit</a>
					<!--<button type="button" class="btn btn-success" data-bs-id="1" data-bs-toggle="modal" data-bs-target="#exampleModal">red</button>-->
					<div class="dbfl">
						<form method="post" action="{{route('child.destroy',[$child])}}">
							@csrf
							<button type="submit" name="delete_child" class="btn btn-danger"><b>-</b></button>
						</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('child.show',[$child])}}">rod</a>
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
						<h5 class="modal-title" id="exampleModalLabel">Vaiko duomenys</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
							<form action="{{route('child.store')}}" method="POST">
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-2">
									<label for="name" class="col-form-label">Vardas</label>
								  </div>
								  <div class="col-6">
									<input type="text" id="name" name="child_name" class="form-control" aria-describedby="passwordHelpInline">
								  </div>
								</div>
							  </div>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-2">
									<label for="surname" class="col-form-label">Pavardė</label>
								  </div>
								  <div class="col-6">
									<input type="text" id="surname" name="child_surname" class="form-control" aria-describedby="passwordHelpInline">
								  </div>
								</div>
							  </div>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-2">
									<label for="group" class="col-form-label">Grupė</label>
								  </div>
									<div class="col-6">
										<select class="form-select" aria-label=".form-select-sm example" name="child_group_id">
											@foreach ($groups as $group)
											<option selected value="{{$group->id}}">{{$group->group_title}}</option>
											@endforeach
										</select>
									</div>
								  <div class="col-4">
									<button class="btn btn-success" type="button" name="" onclick="pop_up('{{route('group.create')}}')">Įvesti naują</button>
								  </div>
								</div>
							  </div>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-5">
									<label for="parents_email" class="col-form-label">Tevų e. pašto adresas</label>
								  </div>
								  <div class="col-7">
									<input type="email" id="parents_email" name="child_parents_email" class="form-control" aria-describedby="passwordHelpInline">
								  </div>
								</div>
							  </div>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-5">
									<label for="parents_telno" class="col-form-label">Tėvų telefono numeris</label>
								  </div>
								  <div class="col-7">
									<input type="text" id="parents_telno" name="child_parents_telno" class="form-control" aria-describedby="passwordHelpInline">
								  </div>
								</div>
							  </div>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-5">
									<label for="child_birthdate" class="col-form-label">Vaiko gimimo diena</label>
								  </div>
								  <div class="col-7">
									<input type="text" id="child_birthdate" name="child_birthdate" class="form-control" aria-describedby="passwordHelpInline">
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
	</div>	
</div>	
<x-bottom />