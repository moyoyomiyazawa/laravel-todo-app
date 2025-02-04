
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo App</title>
    @yield('styles')
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header>
    <nav class="my-navbar">
        <a href="/" class="my-navbar-brand">Todo App</a>
        <div class="my-navbar-control">
            @if (Auth::check())
                <span class="my-navbar-item">ようこそ、{{ Auth::user()->name }}さん</span>
                ｜
                <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="my-navbar-item">ログイン</a>
                ｜
                <a href="{{ route('register') }}" class="my-navbar-item">会員登録</a>
            @endif
        </div>
    </nav>
</header>
<main>
    @yield('content')
</main>
@auth
    <script>
        document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        })
    </script>
@endauth
@yield('scripts')
</body>
</html>
