<x-head />
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Grupių sąrašas</h2>
		</div>
	</div>
	<div class="row">
		
		<div class="col-6">


			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 200px;">Grupės numeris</th>
				<th>Grupės pavadinimas</th>
				<th style="width: 180px;">
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Pridėti grupę</button>
				</th>
			  </tr>
			</thead>
			<tbody>
			<?php $i=1; ?>
			@foreach ($groups as $group)
			  <tr>
				<td>{{ $i++; }}</td>
				<td style="text-align: center;">{{$group->group_number}}</td>
				<td style="text-align: left;">{{$group->group_title}}</td>
				<td style="text-align: center;">
					<a class="btn btn-success dbfl" href="{{route('group.edit',[$group])}}">edit</a>
					<!--<button type="button" class="btn btn-success" data-bs-id="1" data-bs-toggle="modal" data-bs-target="#exampleModal">red</button>-->
					<div class="dbfl">
						<form method="post" action="{{route('group.destroy',[$group])}}">
							@csrf
							<button type="submit" name="delete_child" class="btn btn-danger"><b>-</b></button>
						</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('group.show',[$group])}}">rod</a>
				</td>
			  </tr>
			  
			@endforeach

			</tbody>
			</table>
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Grupės duomenys</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						<form action="{{route('group.store')}}" method="POST">
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-4">
								<label for="group_title" class="col-form-label">Grupės pavadinimas</label>
							  </div>
							  <div class="col-6">
								<input type="text" id="group_title" name="group_title" class="form-control" aria-describedby="passwordHelpInline">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-4">
								<label for="group_number" class="col-form-label">Grupės numeris</label>
							  </div>
							  <div class="col-6">
								<input type="text" id="group_number" name="group_number" class="form-control" aria-describedby="passwordHelpInline">
							  </div>
							</div>
						  </div>

						@csrf  
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Uždaryti</button>
							<button class="btn btn-success" type="submit" name="save_group">Saugoti</button>
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
<x-bottom />