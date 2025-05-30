<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>求人サイト（ユーザー）</title>
    <p>ログイン中ユーザー: {{ Auth::check() ? Auth::user()->name : '未ログイン' }}</p>

</head>

<body>
    <header>
        <h1>ユーザー用求人サイト</h1>
        <nav>
            <a href="{{ route('user.recruits.index') }}">求人一覧</a>
            <a href="{{ route('user.recruits.entry.index') }}">応募一覧</a>
            <a href="{{ route('user.recruits.favorite.index') }}">お気に入り</a>
            {{-- ログアウトフォーム --}}
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit"
                    style="background: none; border: none; padding: 0; color: blue; text-decoration: underline; cursor: pointer;">
                    ログアウト
                </button>
            </form>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>
