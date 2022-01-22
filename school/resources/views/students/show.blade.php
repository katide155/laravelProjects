<x-head />


<div class="container">


  <div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Studento duomenys</h5>
	  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Vardas:</div>
				  <div class="col-6">{{$student->student_name}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Pavardė:</div>
				  <div class="col-6">{{$student->student_surname}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Grupė:</div>
					<div class="col-6">
					@foreach ($attendanceGroups as $attendanceGroup)
						@if($student->student_attendance_group_id == $attendanceGroup->id)
							{{$attendanceGroup->attendance_group_name}}
						@endif
					@endforeach
					</div>
				</div>
			  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Nuotrauka:</div>
				  <div class="col-6"><img width="100px" height="100px" src="{{$student->student_image_url}}"/></div>
				</div>
			  </div>

	
			<div class="modal-footer">
	 
				<a class="btn btn-secondary" href="{{route('student.index')}}">Grįžti</a>
				
			    <form method="post" action="{{route('student.destroy', [$student])}}">
					@csrf
					<button class="btn btn-danger" type="submit">Trinti</button>
				</form>
				<a class="btn btn-success" href="{{route('student.edit',[$student])}}">Redaguoti</a>
			</div>
	</div>
  </div>

</div>

<x-bottom />