@extends('user.recruits.user')

@section('content')
<h1>ようこそ、{{ Auth::user()->name }} さん！</h1>
<p>メールアドレス：{{ Auth::user()->email }}</p>
<h2>求人一覧</h2>

@foreach($recruits as $recruit)
    <div class="recruit-card">
        <h3>{{ $recruit->title }}</h3>
        <p>{{ Str::limit($recruit->description, 100) }}</p>
        <a href="{{ route('user.recruits.show', $recruit->id) }}">詳細を見る</a>

        <!-- お気に入りボタン（後で機能追加） -->
        <form action="{{ route('user.recruits.favorite.store', $recruit->id) }}" method="POST">
            @csrf
            <button type="submit">お気に入りに登録</button>
        </form>
    </div>
@endforeach

{{ $recruits->links() }}
@endsection
