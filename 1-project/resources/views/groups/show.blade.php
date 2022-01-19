<x-head />


<div class="container">


  <div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Grupės duomenys</h5>
	  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Pavadinimas:</div>
				  <div class="col-6">{{$group->group_title}}</div>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-4">Numeris:</div>
				  <div class="col-6">{{$group->group_number}}</div>
				</div>
			  </div>
	
			<div class="modal-footer">
	 
				<a class="btn btn-secondary" href="{{route('group.index')}}">Grįžti</a>
				
			    <form method="post" action="{{route('group.destroy', [$group])}}">
					@csrf
					<button class="btn btn-danger" type="submit">Trinti</button>
				</form>
				<a class="btn btn-success" href="{{route('group.edit',[$group])}}">Redaguoti</a>
			</div>
	</div>
  </div>

</div>

<x-bottom />