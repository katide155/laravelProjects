<x-head />
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Vaikų sąrašas</h2>
		</div>
	</div>
	<div class="row">
		
		<div class="col-12">
			@if(session()->has('error_message'))
		<div class="alert alert-danger">
			{{session()->get('error_message')}}
		</div>
		@endif
		@if(session()->has('success_message'))
			<div class="alert alert-success">
				{{session()->get('success_message')}}
			</div>
		@endif
			
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
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="clearValues()">Pridėti vaiką</button>
				</th>
			  </tr>
			</thead>
			<tbody>
			
			
			<?php $i=1; ?>
			@foreach ($children as $child)
			  <tr>
				<td>{{ $i++; }}</td>
				<td style="text-align: left;"><div id="child_name_{{$child->id}}">{{$child->child_name}}</div></td>
				<td style="text-align: left;"><div id="child_surname_{{$child->id}}">{{$child->child_surname}}</div></td>
				
				<td style="text-align: right;">
				@foreach ($groups as $group)
					@if($child->child_group_id == $group->id)
						<input type="hidden" id="child_group_id_{{$child->id}}" value="{{$child->child_group_id}}">
						<a href="{{route('group.show',[$group])}}">{{$group->group_title}}</a>
					@endif
				@endforeach
				</td>
				
				<td style="text-align: right;"><div id="child_parents_email_{{$child->id}}">{{$child->child_parents_email}}</div></td>
				<td style="text-align: right;"><div id="child_parents_telno_{{$child->id}}">{{$child->child_parents_telno}}</div></td>
				<td style="text-align: right;"><div id="child_birthdate_{{$child->id}}">{{$child->child_birthdate}}</div></td>
				<td style="text-align: right;">
					<!--<a class="btn btn-success dbfl" href="{{route('child.edit',[$child])}}">edit</a>-->
					<button type="button" class="btn btn-success dbfl" data-bs-id="1" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="setIdToEdit({{$child->id}})">red</button>
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
							<form action="{{route('child.store')}}" method="POST" id='child_form'>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-2">
									<label for="child_name" class="col-form-label">Vardas</label>
								  </div>
								  <div class="col-6">
									<input type="text" id="child_name" name="child_name" class="form-control" aria-describedby="passwordHelpInline">
								  </div>
								</div>
							  </div>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-2">
									<label for="child_surname" class="col-form-label">Pavardė</label>
								  </div>
								  <div class="col-6">
									<input type="text" id="child_surname" name="child_surname" class="form-control" aria-describedby="passwordHelpInline">
								  </div>
								</div>
							  </div>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-2">
									<label for="group" class="col-form-label">Grupė</label>
								  </div>
									<div class="col-6">
										<select id="child_group_id" class="form-select" aria-label=".form-select-sm example" name="child_group_id">
											@foreach ($groups as $group)
											<option value="{{$group->id}}">{{$group->group_title}}</option>
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
									<label for="child_parents_email" class="col-form-label">Tevų e. pašto adresas</label>
								  </div>
								  <div class="col-7">
									<input type="email" id="child_parents_email" name="child_parents_email" class="form-control" aria-describedby="passwordHelpInline">
								  </div>
								</div>
							  </div>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-5">
									<label for="child_parents_telno" class="col-form-label">Tėvų telefono numeris</label>
								  </div>
								  <div class="col-7">
									<input type="text" id="child_parents_telno" name="child_parents_telno" class="form-control" aria-describedby="passwordHelpInline">
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
			
			
			
			function clearValues(){
				setElementValue('child_name', '');
				setElementValue('child_surname', '');
				setElementValue('child_group_id', '');
				document.getElementById('child_group_id').selected = false;
				setElementValue('child_parents_email', '');
				setElementValue('child_parents_telno', '');
				setElementValue('child_birthdate', '');
				changeFormAction('child_form');
			}
			

			
			function setIdToEdit(id){
				
				if(id){
					let child_name = getElementInner('child_name_' + id);
					setElementValue('child_name', child_name);
					let child_surname = getElementInner('child_surname_' + id);
					setElementValue('child_surname', child_surname);
					let child_group_id = getElementValue('child_group_id_' + id);
					document.getElementById('child_group_id').value = child_group_id;
					let child_parents_email = getElementInner('child_parents_email_' + id);
					setElementValue('child_parents_email', child_parents_email);
					let child_parents_telno = getElementInner('child_parents_telno_' + id);
					setElementValue('child_parents_telno', child_parents_telno);
					let child_birthdate = getElementInner('child_birthdate_' + id);
					setElementValue('child_birthdate', child_birthdate);
					changeFormAction('child_form', id);
				}
				
			}
			</script>
		</div>
	</div>	

</div>
	
<x-bottom />