@extends('layouts.app')

@section('content')

<div class="container">
	<div class = "row justify-content-center homediv">
		<div class = "col-8">	
		
			@if (Route::has('login'))
				<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block row align-items-center homebuttons">
					@auth
					<div class="col homebuttdiv">
						<a href="{{ url('/home') }}" class="pageLink">Home</a>
					</div>
					@else
					<div class="col homebuttdiv">
						<a href="{{ route('login') }}" class="pageLink">Prisijungti</a>
					</div>
						@if (Route::has('register'))
							<div class="col homebuttdiv">
								<a href="{{ route('register') }}" class="pageLink">Registruotis</a>
							</div>
						@endif
					@endauth
				</div>
			@endif

		</div>
	</div>
</div>
	
@endsection