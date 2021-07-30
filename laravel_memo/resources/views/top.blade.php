<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモ帳</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
    body {}
    </style>
</head>

<body>
    <div class="main">
        <div class="container">
            <h1>シンプルメモ帳</h1>
            @if (Route::has('login'))
            <div class="btn_area">
                @auth
                <div class="btn home_btn">
                    <a href="{{ url('/home') }}" class="">メモ帳へ</a>
                </div>
                @else
                <div class="btn login_btn">
                    <a href="{{ route('login') }}" class="">ログイン</a>
                </div>
                @if (Route::has('register'))
                <div class="btn register_btn">
                    <a href="{{ route('register') }}" class="">登録する</a>
                </div>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>
</body>

</html>