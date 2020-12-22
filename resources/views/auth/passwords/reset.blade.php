@extends('layouts.app')

@section('content')
<div class="row justify-content-center text-right">
    <div class="col-md-8">
        <div class="card p-3 p-md-3 p-lg-5 mt-5">
            <h3 class="text-center pb-5 font-weight-bold">إعادة تعيين كلمة المرور</h3>

            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="email">{{ __('البريد الإلكتروني') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <div class="text-danger mt-2" dir="rtl"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('كلمة المرور') }}</label>


                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('إعادة كلمة المرور') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>

                    <div class="form-group mt-3 text-left">
                        <button type="submit" class="btn btn-primary">
                            {{ __('إعادة تعيين كلمة المرور') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection