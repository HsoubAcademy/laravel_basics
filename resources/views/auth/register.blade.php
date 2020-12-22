@extends('layouts.app')

@section('title', 'تسجيل جديد')

@section('content')

<div class="row justify-content-center text-right">
    <div class="col-md-8">
        <div class="card p-3 p-md-3 p-lg-5 mt-5">
            <h3 class="text-center pb-5 font-weight-bold">تسجيل جديد</h3>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input id="name" type="text" class="form-control text-right @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                        @error('name')
                        <div class="text-danger mt-2" dir="rtl"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('البريد الإلكتروني') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}"  autocomplete="email">
                        @error('email')
                        <div class="text-danger mt-2" dir="rtl"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('كلمة المرور') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" 
                            autocomplete="new-password">

                        @error('password')
                        <div class="text-danger mt-2" dir="rtl"><small>{{ $message }}</small></div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('تأكيد كلمة المرور') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                             autocomplete="new-password">
                    </div>

                    <div class="form-group text-left mt-5">
                        <button type="submit" class="btn btn-primary">
                            {{ __('تسجيل جديد') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection