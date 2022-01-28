@extends('layouts.app')

@section('content')

<div class="container">
    <div id="login">
        <h3 class="text-center text-white pt-5">Norėdami naudotis sistema, prisijunkite</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12 login-form">
					
                        <form id="login-form" class="form" action="{{ route('login') }}" method="post" >
							@csrf
                            <h3 class="text-center text-info login-form-text">Prisijungimo duomenys:</h3>
                            <div class="form-group">
                                <label for="username" class="text-info login-form-text">Vartotojo vardas:</label><br>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info login-form-text">Slaptažodis:</label><br>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                       
							
                            <div class="form-group ">
                                <button type="submit" class="button-sub">
                                    {{ __('Prisijungti') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Pamiršote slaptažodį?') }}
                                    </a>
                                @endif								
                            </div>
                        </form>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
