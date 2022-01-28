@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center homediv">
	
	    <div class="col-md-8">
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif
        </div>
		
		<div class = "col-8">	
			<div class="row align-items-center homebuttons">
				<div class="col homebuttdiv">
				  <a class="pageLink" href="{{route('child.index')}}">Vaikų sąrašas</a>
				</div>
				<div class="col homebuttdiv">
				  <a class="pageLink" href="{{route('group.index')}}">Grupių sąrašas</a>
				</div>
				<div class="col homebuttdiv">
				  <a class="pageLink" href="{{route('child.index')}}">Auklėtojų sąrašas</a>
				</div>
			</div>
		</div>
		
    </div>
</div>

@endsection
