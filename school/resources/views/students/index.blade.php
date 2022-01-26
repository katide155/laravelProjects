@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Studentų sąrašas</h2>
		</div>
	</div>
	<div class="row">
		
		<div class="col-12">
		
			@if(session()->has('success_message'))
				<div class="alert alert-success">
					{{session()->get('success_message')}}
				</div>
			@endif
			
			@if(count($students) == 0)
				
			<p>Nėra jokių įrašų</p>
			
			<p><a href="{{route('student.create')}}">Sukurti naują įrašą</a></p>
			
			@else

			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 200px;">Vardas</th>
				<th>Pavardė</th>
				<th style="width: 200px;">Grupės pavadinimas</th>
				<th style="width: 200px;">Nuotrauka</th>
				<th style="width: 160px;">
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Pridėti studentą</button>
				</th>
			  </tr>
			</thead>
			<tbody>
			
			
			<?php $i=1; ?>
			@foreach ($students as $student)
			  <tr>
				<td>{{ $i++; }}</td>
				<td style="text-align: center;">{{$student->student_name}}</td>
				<td style="text-align: center;">{{$student->student_surname}}</td>
				<td style="text-align: center;">
				{{$student->studentAttendanceGroup->attendance_group_name}}
				</td>
				<td style="text-align: center;">
					<img width="80px" height="30px" src="{{$student->student_image_url}}"/>
				</td>
				<td style="text-align: center;">
					<a class="btn btn-success dbfl" href="{{route('student.edit',[$student])}}">edit</a>
					<div class="dbfl">
					<form method="post" action="{{route('student.destroy',[$student])}}">
						@csrf
						<button type="submit" name="delete_client" class="btn btn-danger"><b>-</b></button>
					</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('student.show',[$student])}}">rod</a>
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
						<h5 class="modal-title" id="exampleModalLabel">Studento duomenys</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
							<form action="{{route('student.store')}}" method="POST">
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-2">
									<label for="student_name" class="col-form-label">Vardas</label>
								  </div>
								  <div class="col-6">
									<input type="text" id="student_name" name="student_name" class="form-control">
								  </div>
								</div>
							  </div>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-2">
									<label for="student_surname" class="col-form-label">Pavardė</label>
								  </div>
								  <div class="col-6">
									<input type="text" id="student_surname" name="student_surname" class="form-control">
								  </div>
								</div>
							  </div>
							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-2">
									<label for="student_attendance_group_id" class="col-form-label">Grupė</label>
								  </div>
									<div class="col-6">
										<select class="form-select" aria-label=".form-select-sm example" name="student_attendance_group_id">
											@foreach ($attendanceGroups as $attendanceGroup)
											<option value="{{$attendanceGroup->id}}">{{$attendanceGroup->attendance_group_name}}</option>
											@endforeach
										</select>
									</div>
								  <div class="col-4">
									<button class="btn btn-success" type="button" name="" onclick="pop_up('{{route('attendancegroup.create')}}')">Įvesti naują</button>
								  </div>
								</div>
							  </div>

							  <div class="modal-body">
								<div class="row g-3 align-items-center">
								  <div class="col-5">
									<label for="student_image_url" class="col-form-label">Nuotrauka</label>
								  </div>
								  <div class="col-7">
									<input type="text" id="student_image_url" name="student_image_url" class="form-control">
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
@endsection