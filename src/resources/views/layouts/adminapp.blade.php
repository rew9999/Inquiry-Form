<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/common.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Old+Mincho&display=swap" rel="stylesheet">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a href="/" class="header__logo">
                FashionablyLate
            </a>
            @if(Request::is('register'))
                <a href="/login" class="header-button">login</a>
            @elseif(Request::is('login'))
                <a href="/register" class="header-button">register</a>
            @elseif(Request::is('admin') || Request::is('search'))
                <form method="POST" action="/logout" class="header-form">
                    @csrf
                    <button type="submit" class="header-button">logout</button>
                </form>
            @endif
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>