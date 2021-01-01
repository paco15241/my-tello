@extends('layouts.app')

@section('content')
<section class="px-4 py-2">
    <h2 class="text-2xl font-thin">{{ __('Register') }}</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="field">
            <label for="name" class="label">{{ __('Name') }}</label>

            <div>
                <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

            <div>
                <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>
        </div>

        <div class="field">
            <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

            <div>
                <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="actions mt-2">
            <button type="submit" class="button">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</section>
@endsection
