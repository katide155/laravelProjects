<x-head />


<div class="container">


  <div class="modal-dialog big-modal modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Grupės duomenys</h5>
	  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Pavadinimas:</div>
				  <div class="col-10">{{$attendanceGroup->attendance_group_name}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Lygis:</div>
				  <div class="col-10">{{$attendanceGroup->attendance_group_difficulty}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Mokykla:</div>
				  <div class="col-10">{{$attendanceGroup->attendanceGroupSchool->school_name}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Aprašymas:</div>
				  <div class="col-10">{{$attendanceGroup->attendance_group_description}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Grupės studentai:</div>
				  <div class="col-10">
						@foreach($attendanceGroup->attendanceGroupStudents as $student)
							<div class="row g-3 align-items-center">
								<div class="col-1">{{$student->id}}</div>
								<div class="col-2">{{$student->student_name}}</div>
								<div class="col-2">{{$student->student_surname}}</div>
								<div class="col-2">
								<img width="80px" height="30px" src="{{$student->student_image_url}}"/>
								</div>
								<div class="col-2">
								<form method="post" action="{{route('student.destroy', [$student])}}">
									@csrf
									<button class="btn btn-danger" type="submit">Trinti</button>
								</form>	
								</div>
							</div>
						@endforeach
				  </div>
				</div>
			  </div>	
			<div class="modal-footer">
	 
				<a class="btn btn-secondary" href="{{route('attendancegroup.index')}}">Grįžti</a>
				
			    <form method="post" action="{{route('attendancegroup.destroy', [$attendanceGroup])}}">
					@csrf
					<button class="btn btn-danger" type="submit">Trinti</button>
				</form>
				<a class="btn btn-success" href="{{route('attendancegroup.edit',[$attendanceGroup])}}">Redaguoti</a>
			</div>
	</div>
  </div>

</div>

<x-bottom />