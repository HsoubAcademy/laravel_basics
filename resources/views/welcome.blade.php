<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>مشاريعي</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">

    <!-- Styles -->
    <style>
        html,
        body {
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="flex-center position-ref full-height">

            

            <div class="content">
                <div class="title m-b-md">
                    مشاريعي
                </div>
                @if (Route::has('login'))
                <div>
                    @auth
                    <a class="btn btn-lg btn-primary" href="{{ url('/home') }}">Home</a>
                    @else
                    <a class="btn btn-lg btn-primary" href="{{ route('login') }}">تسجيل الدخول</a>

                    @if (Route::has('register'))
                    <a class="btn btn-lg btn-primary" href="{{ route('register') }}">تسجيل جديد</a>
                    @endif
                    @endauth
                </div>
                @endif

            </div>
        </div>
    </div>
</body>

</html>