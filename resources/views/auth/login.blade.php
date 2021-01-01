@extends('layouts.app')

@section('content')
<section class="px-4 py-2">
    <h2 class="text-2xl font-thin">{{ __('Login') }}</h2>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field">
            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

            <div>
                <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <label for="password" class="label">{{ __('Password') }}</label>

            <div>
                <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="actions mt-2">
            <button type="submit" class="button">
                {{ __('Login') }}
            </button>
            
            {{--  @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif  --}}
        </div>
    </form>
</section>
@endsection
