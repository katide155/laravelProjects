@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Grupių sąrašas</h2>
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
				<th style="width: 200px;">Grupės pavadinimas</th>
				<th style="width: 200px;">Grupės lygis</th>
				<th style="width: 200px;">Mokykla</th>
				<th >Grupės aprašymas</th>
				<th >Grupės studentų kiekis</th>
				<th style="width: 180px;">
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Pridėti grupę</button>
				</th>
			  </tr>
			</thead>
			<tbody>
			<?php $i=1; ?>
			@foreach ($attendanceGroups as $attendanceGroup)
			  <tr>
				<td>{{ $i++; }}</td>
				<td style="text-align: left;">{{$attendanceGroup->attendance_group_name}}</td>
				<td style="text-align: left;">{{$attendanceGroup->attendance_group_difficulty}}</td>
				<td style="text-align: left;">{{$attendanceGroup->attendanceGroupSchool->school_name}}</td>
				<td style="text-align: left;">{{$attendanceGroup->attendance_group_description}}</td>
				<td>{{count($attendanceGroup->attendanceGroupStudents)}}</td>
				<td style="text-align: right;">
					<a class="btn btn-success dbfl" href="{{route('attendancegroup.edit',[$attendanceGroup])}}">edit</a>
					<div class="dbfl">
					<form method="post" action="{{route('attendancegroup.destroy',[$attendanceGroup])}}">
						@csrf
						<button type="submit" name="delete_group" class="btn btn-danger"><b>-</b></button>
					</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('attendancegroup.show',[$attendanceGroup])}}">rod</a>
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
						<form action="{{route('attendancegroup.store')}}" method="POST">
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-4">
								<label for="attendance_group_name" class="col-form-label">Grupės pavadinimas</label>
							  </div>
							  <div class="col-6">
								<input type="text" id="attendance_group_name" name="attendance_group_name" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-4">
								<label for="attendance_group_difficulty" class="col-form-label">Grupės lygis</label>
							  </div>
							  <div class="col-6">
								<select class="form-select" aria-label=".form-select-sm example" name="attendance_group_difficulty">
								@foreach ($levels as $level)
									<option value="{{$level}}">{{$level}}</option>
								@endforeach
								</select>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-4">
								<label for="attendance_group_school_id" class="col-form-label">Mokykla</label>
							  </div>
							  <div class="col-6">
								<select class="form-select" aria-label=".form-select-sm example" name="attendance_group_school_id">
								@foreach ($schools as $school)
									<option value="{{$school->id}}">{{$school->school_name}}</option>
								@endforeach
								</select>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-4">
								<label for="attendance_group_description" class="col-form-label">Grupės aprašymas</label>
							  </div>
							  <div class="col-6">
								<textarea type="textarea" id="attendance_group_description" name="attendance_group_description" class="form-control"></textarea>
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