@extends('layouts.app')

@section('title', 'الملف الشخصي')

@section('content')
<div class="row justify-content-center text-right">
    <div class="col-md-6">
        <div class="card p-3 p-md-3 p-lg-5 mt-5">
            <div class="text-center">
                <img width="82px" height="82px" src="{{ asset(auth()->user()->image) }}">
                <h3 class="mt-4 font-weight-bold">{{ auth()->user()->name }}</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="/profile" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input name="name" type="text"
                            class="form-control text-right @error('name') is-invalid @enderror" autocomplete="name"
                            autofocus value="{{ auth()->user()->name }}">
                        @error('name')
                        <div class="text-danger mt-2" dir="rtl"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                            autocomplete="email" value="{{ auth()->user()->email }}">
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

                    <div class="form-group">
                        <label for="email">تغيير الصورة الشخصية</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label text-left" id="image-label" for="image" data-browse="استعرض"></label>
                        </div>
                        @error('image')
                        <div class="text-danger mt-2" dir="rtl"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <div class="form-group d-flex mt-5">
                        <button type="submit" class="btn btn-primary mr-2">
                            {{ __('حفظ التعديلات') }}
                        </button>

                        <form action="/logout">
                            <button type="submit" class="btn btn-light">تسجيل الخروج</button>
                        </form>

                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('image').onchange = uploadOnChange;
    function uploadOnChange() {
        var filename = this.value;
        var lastIndex = filename.lastIndexOf("\\");
        if (lastIndex >= 0) {
            filename = filename.substring(lastIndex + 1);
        }
        document.getElementById('image-label').innerHTML = filename;
}
</script>
@endsection