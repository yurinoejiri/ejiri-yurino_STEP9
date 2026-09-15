<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'ECサイト')</title>
        <link rel="styesheet" href="style.css">
    </head>
    <body>
        <header>
            <p>Cytech EC</p>

            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">マイページ</a></li>
                    <li>ログインユーザー: {{ $auth()->$user()->name ?? 'ゲスト' }}</li>
            </nav>

            <button>ログアウト</button>
        </header>
        <main>
            <div>
                @yield('content')
            </div>
        </main>
        <footer>
            <button>お問い合わせ</button>

            <div>
                <a href="">Home</a>
                <a href="">マイページ</a>
            </div>

            <p>&copy; 2024 Company,lnc</p>
        </footer>
    </body>
</html>