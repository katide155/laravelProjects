<x-head />

<div class="container">
  <div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Studento duomenys</h5>
	  </div>
			<form action="{{route('student.update', [$student])}}" method="POST">
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-3">
					<label for="student_name" class="col-form-label">Vardas</label>
				  </div>
				  <div class="col-9">
					<input type="text" id="student_name" name="student_name" class="form-control" value="{{$student->student_name}}">
				  </div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-3">
					<label for="student_surname" class="col-form-label">Pavardė</label>
				  </div>
				  <div class="col-9">
					<input type="text" id="student_surname" name="student_surname" class="form-control" value="{{$student->student_surname}}">
				  </div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-3">
					<label for="student_attendance_group_id" class="col-form-label">Grupė</label>
				  </div>
					<div class="col-5">
						
						<select class="form-select" aria-label=".form-select-sm example" name="student_attendance_group_id">
							@foreach ($attendanceGroups as $attendanceGroup)
								@if($attendanceGroup->id == $student->student_attendance_group_id)
									<option selected value="{{$attendanceGroup->id}}">{{$attendanceGroup->attendance_group_name}}</option>
								@else
									<option value="{{$attendanceGroup->id}}">{{$attendanceGroup->attendance_group_name}}</option>
								@endif
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
				  <div class="col-4">
					<label for="student_image_url" class="col-form-label">Nuotraukos kelias</label>
				  </div>
				  <div class="col-8">
					<input type="text" id="student_image_url" name="student_image_url" class="form-control" value="{{$student->student_image_url}}">
				  </div>
				</div>
			  </div>

			@csrf  
			  <div class="modal-footer">
				<a class="btn btn-secondary" href="{{route('student.index')}}">Grįžti</a>
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