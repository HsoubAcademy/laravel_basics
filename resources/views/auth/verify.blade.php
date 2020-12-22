@extends('layouts.app')

@section('content')
      <div class="row justify-content-center text-right">
        <div class="col-md-8">
            <div class="card p-3 p-md-3 p-lg-5 mt-5">
                <h3 class="text-center pb-5 font-weight-bold">التحقق من البريد الإلكتروني</h3>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
