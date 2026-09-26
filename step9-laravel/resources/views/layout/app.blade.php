<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'ECサイト')</title>
        @vite(['resources/sass/app.sass','resources/js/app.js','resources/css/style.css'])
    </head>
    <body>
        <header class="header">
            <p>Cytech EC</p>

            <nav class=nav-manu>
                <a href="{{ route('index') }}">Home</a>
                <a href="{{ route('mypage') }}">マイページ</a>
                <p>ログインユーザー: {{ auth()->user()->name??'ゲスト' }}</p>
                <button class="logout-btn">ログアウト</button>
            </nav>
        </header>
        <main class="main">
            <div>
                @yield('content')
            </div>
        </main>
        <footer class="footer">
            <button class="inquiry-btn">お問い合わせ</button>

            <div class="footer-link">
                <a href="{{ route('index') }}">Home</a>
                <a href="{{ route('mypage') }}">マイページ</a>
            </div>

            <p>&copy; 2024 Company,lnc</p>
        </footer>
    </body>
</html>