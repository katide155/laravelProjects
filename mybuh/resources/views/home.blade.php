@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sveiki atvykę į būsimą buahlerinės apskaitos svetainę!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Jūs esate prisijungę, ir galite naršyti žemiau esančiuose puslapiuose!') }}
                </div>
            </div>
        </div>
	</div>
	<div class = "row justify-content-center homediv">
		<div class = "col-12">	
			<div class="row align-items-center homebuttons">
				<div class="col homebuttdiv">
					<a href="{{ route('accountplan.index') }}" class="pageLink">Sąskaitų planas</a>
				</div>
				<div class="col homebuttdiv">
					<a href="{{ route('child.index') }}" class="pageLink">Vaikų sąrašas</a>
				</div>
				<div class="col homebuttdiv">
					<a href="{{ route('login') }}"  class="pageLink">Nustatymai (kol kas nėra)</a>
				</div>
			</div>
		</div>
    </div>
</div>
@endsection
