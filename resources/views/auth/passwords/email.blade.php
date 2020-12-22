@extends('layouts.app')

@section('content')
    <div class="row justify-content-center text-right">
        <div class="col-md-8">
            <div class="card">
                <h3 class="text-center py-5 font-weight-bold">إعادة تعيين كلمة المرور</h3>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('البريد الإلكتروني') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                @error('email')
                                <div class="text-danger mt-2" dir="rtl"><small>{{ $message }}</small></div>
                                @enderror
                        </div>

                        <div class="form-group text-left">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('أرسل رابط إعادة تعيين كلمة المرور') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
