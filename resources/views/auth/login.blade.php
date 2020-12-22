@extends('layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')
<div class="row justify-content-center text-right">
    <div class="col-md-8">
        <div class="card p-3 p-md-3 p-lg-5 mt-5">
            <h3 class="text-center pb-5 font-weight-bold">تسجيل الدخول</h3>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                            autocomplete="email" autofocus>
                        @error('email')
                        <div class="text-danger mt-2" dir="rtl"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <input name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            autocomplete="current-password">
                        @error('password')
                        <div class="text-danger mt-2" dir="rtl"><small>{{ $message }}</small></div>
                        @enderror
                    </div>



                    <div class="form-group d-flex" dir="rtl">
                        <label class="form-check-label mr-4 ml-auto" for="remember">
                            {{ __('تذكرني') }}
                        </label>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                    </div>


                    <div class="form-group d-flex mt-5">
                        <button type="submit" class="btn btn-primary mr-auto">
                            {{ __('تسجيل الدخول') }}
                        </button>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link pr-0" href="{{ route('password.request') }}">
                            {{ __('نسيت كلمة المرور؟') }}
                        </a>
                        @endif
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection