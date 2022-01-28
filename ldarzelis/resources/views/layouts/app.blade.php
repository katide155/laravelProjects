<x-head />
    <div id="app">

	@guest	
	
	@else
		<x-header />
	@endguest
        <main class="py-4">
            @yield('content')
        </main>
    </div>
<x-bottom />
