
@extends('user.recruits.user')

@section('content')
<h1>ようこそ、{{ Auth::user()->name }} さん！</h1>
<p>メールアドレス：{{ Auth::user()->email }}</p>

<h2>求人一覧</h2>

{{-- 求人検索 --}}
<form method="GET" action="{{ route('user.recruits.index') }}">
    @csrf

     <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="キーワード検索">

  {{-- <select name="category_id">
    <option value="">カテゴリを選択</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select> --}}

    <select name="sort">
        <option value="">並び替え</option>
        <option value="latest" {{ request('sort_order') == 'latest' ? 'selected' : '' }}>新着順</option>
    </select>

    <button type="submit">検索</button>
</form>

@foreach($recruits as $recruit)
    <div class="recruit-card">
        <h3>   {{ $recruit->id }}:{{ $recruit->name }}</h3>
        {{-- <p>{{ Str::limit($recruit->information, 100) }}</p> --}}
          <p>{{ $recruit->information }}</p>

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

