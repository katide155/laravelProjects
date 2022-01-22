<x-head />

<div class="container">

  <div class="modal-dialog big-modal modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Grupės duomenys</h5>
	  </div>
	<form action="{{route('attendancegroup.store')}}" method="POST">
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="attendance_group_name" class="col-form-label">Grupės pavadinimas</label>
		  </div>
		  <div class="col-3">
			<input type="text" id="attendance_group_name" name="attendance_group_name" class="form-control" >
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="attendance_group_difficulty" class="col-form-label">Grupės lygis</label>
		  </div>
		  <div class="col-3">
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
		  <div class="col-2">
			<label for="attendance_group_school_id" class="col-form-label">Mokykla</label>
		  </div>
		  <div class="col-3">
			<select class="form-select" aria-label=".form-select-sm example" name="attendance_group_school_id">
				@foreach ($schools as $school)
					<option  value="{{$school->id}}">{{$school->school_name}}</option>
				@endforeach
			</select>
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-2">
			<label for="attendance_group_description" class="col-form-label">Grupės aprašymas</label>
		  </div>
		  <div class="col-10">
			<textarea id="summernote" type="textarea" id="attendance_group_description" name="attendance_group_description" class="form-control" rows="4" cols="50">
			</textarea>
		  </div>
		</div>
	  </div>
	@csrf  
	  <div class="modal-footer">
		<a class="btn btn-secondary" href="{{route('attendancegroup.index')}}">Grįžti</a>
		<button class="btn btn-success" type="submit" name="save_group">Saugoti</button>
	  </div>
	</form>
	</div>
  </div>

</div>

<x-bottom />