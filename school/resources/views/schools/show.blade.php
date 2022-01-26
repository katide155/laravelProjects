@extends('layouts.app')

@section('content')


<div class="container">


  <div class="modal-dialog big-modal modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Mokyklos duomenys</h5>
	  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Pavadinimas:</div>
				  <div class="col-4">{{$school->school_name}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Mokyklos adresas:</div>
				  <div class="col-4">{{$school->school_place}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Mokyklos tel. Nr.:</div>
				  <div class="col-4">{{$school->school_phone}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-2">Aprašymas:</div>
				  <div class="col-4">{{$school->school_description}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Mokyklos grupės:</div>
				  <div class="col-6">
						@foreach($school->schoolAttendanceGroups as $attendanceGroup)
							<div class="row g-3 align-items-center">
								<div class="col-1">
									{{$attendanceGroup->id}}
								</div>
								<div class="col-4">
									{{$attendanceGroup->attendance_group_name}}
								</div>
								<div class="col-2">	
									<form method="post" action="{{route('attendancegroup.destroy', [$attendanceGroup])}}">
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
	 
				<a class="btn btn-secondary" href="{{route('school.index')}}">Grįžti</a>
				
			    <form method="post" action="{{route('school.destroy', [$school])}}">
					@csrf
					<button class="btn btn-danger" type="submit">Trinti</button>
				</form>
				<a class="btn btn-success" href="{{route('school.edit',[$school])}}">Redaguoti</a>
			</div>
	</div>
  </div>

</div>

@endsection