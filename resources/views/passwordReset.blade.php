<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>إعادة تعيين كلمة المرور</title>

    <style>
        @import url(//fonts.googleapis.com/earlyaccess/notokufiarabic.css);
        @charset "UTF-8";

        .header {
            padding: 10px 0.8rem;
            background-color: #4e2398;
            text-align: center;
            font-weight: 400;
        }

        .card {
            background-color: #fff;
            box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            padding: 2em;
        }

        h1 {
            text-align: center;
            color: #fff;
            font-size: 1.2em;
        }

        body {
            font-family: 'Noto Kufi Arabic';
            font-size: 1em;
            width: 60%;
            margin: 0 auto;
            background-color: #f7fbff;
            color: #212529;
        }

        a {
            padding: 10px;
            background-color: #4e2398;
            border: none;
            color: #fff;
            font-size: 0.9em;
            font-family: 'Noto Kufi Arabic';
            text-decoration: none;
            text-align: center;

        }

        .cta {
            margin-top: 1em;
            margin-bottom: 1em;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>

<body>
    <div class="header">
        <h1>مشاريعي</h1>
    </div>
    <div class="card">

        <p><strong>مرحبًا!</strong></p>
        <p>لقد وصلتك هذه الرسالة لأننا تلقينا طلبًا لإعادة تعيين كلمة المرور الخاصة بحسابك.</p>
        <div class="cta">
            <a href="{{ url('password/reset', $token) }}?email={{ $email }}" class="button">أعد تعيين كلمة المرور</a>
        </div>
        <p>ستنتهي صلاحية هذا الرابط بعد 60 دقيقة.</p>
        <p>إن لم تكن قد طلبت إعادة تعيين كلمة المرور الخاصة بك، فليس عليك أن تفعل شيئًا</p>
        <p>أطيب التحيات,<br /> مشاريعي</p>
    </div>
</body>

</html>