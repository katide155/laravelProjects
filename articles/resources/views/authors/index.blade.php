@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Mokyklų sąrašas</h2>
		</div>
	</div>
	
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
	<div class="row">
		
		<div class="col-12">


			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 200px;">Mokyklos pavadinimas</th>
				<th style="width: 200px;">Mokyklos adresas</th>
				<th style="width: 200px;">Mokyklos Tel. Nr.</th>
				<th >Mokyklos aprašymas</th>
				<th >Grupių kiekis</th>
				<th style="width: 200px;">Mokyklos logo</th>
				<th style="width: 180px;">
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Pridėti mokyklą</button>
				</th>
				
			  </tr>
			</thead>
			<tbody>
			<?php $i=1; ?>
			@foreach ($schools as $school)
			  <tr>
				<td>{{ $i++; }}</td>
				<td style="text-align: left;">{{$school->school_name}}</td>
				<td style="text-align: left;">{{$school->school_place}}</td>
				<td style="text-align: left;">{{$school->school_phone}}</td>
				<td style="text-align: left;">{{$school->school_description}}</td>
				<td>{{count($school->schoolAttendanceGroups)}}</td>
				<td style="text-align: left;"><img width="100px" src="{{$school->school_logo}}"/></td>
				<td style="text-align: right;">
					<a class="btn btn-success dbfl" href="{{route('school.edit',[$school])}}">edit</a>
					<div class="dbfl">
					<form method="post" action="{{route('school.destroy',[$school])}}">
						@csrf
						<button type="submit" name="delete_type" class="btn btn-danger"><b>-</b></button>
					</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('school.show',[$school])}}">rod</a>
				</td>
				
			  </tr>
			  
			@endforeach

			</tbody>
			</table>
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Mokyklos duomenys</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						<form action="{{route('school.store')}}" method="POST" enctype="multipart/form-data">
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-4">
								<label for="school_name" class="col-form-label">Mokyklos pavadinimas</label>
							  </div>
							  <div class="col-8">
								<input type="text" id="school_name" name="school_name" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-4">
								<label for="school_place" class="col-form-label">Mokyklos adresas</label>
							  </div>
							  <div class="col-8">
								<input type="text" id="school_place" name="school_place" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-4">
								<label for="school_phone" class="col-form-label">Mokyklos tel. Nr.</label>
							  </div>
							  <div class="col-8">
								<input type="text" id="school_phone" name="school_phone" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-4">
								<label for="school_description" class="col-form-label">Mokyklos aprašymas</label>
							  </div>
							  <div class="col-8">
								<textarea type="textarea" id="school_description" name="school_description" class="form-control"></textarea>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-4">
								<label for="school_logo" class="col-form-label">Mokyklos logo</label>
							  </div>
							  <div class="col-8">
								<input type="file" name="school_logo" placeholder="Pasirinkite paveikslėlį" id="school_logo">
							  </div>
							</div>
						  </div>
						@csrf  
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary">Uždaryti</button>
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
@endsection