<x-head />
    <div class="container">
	
	<div class = "row justify-content-center homediv">
	<div class = "col-8">	
		<div class="row align-items-center homebuttons">
			<div class="col homebuttdiv">
			  <a class="pageLink" href="{{route('child.index')}}">Vaikų sąrašas</a>
			</div>
			<div class="col homebuttdiv">
			  <a class="pageLink" href="{{route('child.index')}}">Lankomumo žiniaraštis</a>
			</div>
			<div class="col homebuttdiv">
			  <a class="pageLink" href="{{route('child.index')}}">Lankomumo ir įmokų suvestinė</a>
			</div>
		</div>
		</div>
	</div>
		
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
    </div>

<x-bottom />