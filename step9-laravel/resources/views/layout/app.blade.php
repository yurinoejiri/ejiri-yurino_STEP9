<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'ECサイト')</title>
        @vite(['resources/sass/app.sass','resources/js/app.js','resources/js/purchase.js','resources/css/style.css'])
    </head>
    <body>
        <header class="header">
            <p>Cytech EC</p>

            <nav class=header__nav>
                <a href="{{ route('index') }}">Home</a>
                <a href="{{ route('mypage') }}">マイページ</a>
                <p>ログインユーザー: {{ auth()->user()->name??'ゲスト' }}</p>

                <form class="header__logout-form" id="logoutForm" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                <a class="header__logout-btn" href="{{ route('logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                    ログアウト
                </a>
            </nav>
        </header>
        <main class="main">
            <div>
                @yield('content')
            </div>
        </main>
        <footer class="footer">
            <a href="{{ route('contact') }}" class="footer__inquiry-btn">お問い合わせ</a>

            <div class="footer__links">
                <a href="{{ route('index') }}">Home</a>
                <a href="{{ route('mypage') }}">マイページ</a>
            </div>

            <p>&copy; 2024 Company,lnc</p>
        </footer>
    </body>
</html>