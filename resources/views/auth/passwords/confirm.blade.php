@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3 p-md-3 p-lg-5 mt-5">
                <h3 class="text-center pb-5 font-weight-bold">تسجيل جديد</h3>

                <div class="card-body">
                    {{ __('الرجاء تأكيد كلمة المرور الخاصة بك قبل الاستمرار في هذا الإجراء.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group">
                            <label for="password">{{ __('كلمة المرور') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group mt-3 text-left">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تأكيد كلمة المرور') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link pr-0" href="{{ route('password.request') }}">
                                        {{ __('نسيت كلمة المرور؟') }}
                                    </a>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
