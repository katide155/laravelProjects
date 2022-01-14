<x-head />
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Vaikų sąrašas</h2>
		</div>
	</div>
	<div class="row">
		
		<div class="col-12">


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
				<th style="width: 110px;">
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
				<td style="text-align: right;">{{$child->child_group_id}}</td>
				<td style="text-align: right;">{{$child->child_parents_email}}</td>
				<td style="text-align: right;">{{$child->child_parents_telno}}</td>
				<td style="text-align: right;">{{$child->child_birthdate}}</td>
				<td style="text-align: right;">
					<button type="button" class="btn btn-success" data-bs-id="1" data-bs-toggle="modal" data-bs-target="#exampleModal">red</button>
					<button type="submit" name="delete_child" class="btn btn-danger"><b>-</b></button>
				</td>
			  </tr>
			  
			@endforeach

			</tbody>
			</table>
			
		
			<script>
			function pop_up(url){
				window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=500,width=1000,height=600", true); 
			}
			</script>


		</div>
	</div>	
</div>	
<x-bottom />