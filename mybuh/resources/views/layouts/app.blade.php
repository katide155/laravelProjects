<x-head/>
<body>
    <div id="app">
		<x-header/>
        <main class="py-2">
            @yield('content')
        </main>
    </div>
<x-bottom/>