@extends('layouts.app')

@section('content')
<div class="container">

    <div id="login">
        <h3 class="text-center text-white pt-5">Jei neturite prisijungimo duomenų, prisiregistruokite</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12 login-form">
                        <form id="login-form" class="form" action="{{ route('register') }}" method="post" >
							@csrf
                            <h3 class="text-center text-info login-form-text">Prisijungimo duomenys:</h3>
                            <div class="form-group">
                                <label for="name" class="text-info login-form-text">{{ __('Naudotojo vardas') }}</label><br>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							<div class="form-group">
								<label for="email" class="text-info login-form-text">{{ __('E. pašto adresas') }}</label>

									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

							</div>
                            <div class="form-group">
                                <label for="password" class="text-info login-form-text">{{ __('Slaptažodis') }}</label><br>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							<div class="form-group">
								<label for="password-confirm" class="text-info login-form-text">{{ __('Pakartokite slaptažodį') }}</label>
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
							</div>
							
                            <div class="form-group ">
                                <input type="submit" name="submit" name="{{ __('Registruotis') }}" class="button-sub" value="{{ __('Registruotis') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
