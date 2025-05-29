<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>求人サイト（ユーザー）</title>
</head>
<body>
    <header>
        <h1>ユーザー用求人サイト</h1>
        <nav>
            <a href="{{ route('user.recruits.index') }}">求人一覧</a>
            <a href="{{ route('user.recruits.entry.index') }}">応募一覧</a>
            <a href="{{ route('user.recruits.favorite.index') }}">お気に入り</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
