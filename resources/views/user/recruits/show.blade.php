@extends('recruits.user')

@section('content')
<h2>{{ $recruit->name }}</h2>

<p>{{ $recruit->information }}</p>

<!-- 応募ボタン -->
<form action="{{ route('user.recruits.entry.store', $recruit->id) }}" method="POST" style="margin-top: 20px;">
    @csrf
    <button type="submit">この求人に応募する</button>
</form>

<!-- お気に入り登録ボタン -->
<form action="{{ route('user.recruits.favorite.store', $recruit->id) }}" method="POST" style="margin-top: 10px;">
    @csrf
    <button type="submit">お気に入りに登録</button>
</form>

<!-- 一覧に戻る -->
<div style="margin-top: 20px;">
    <a href="{{ route('user.recruits.index') }}">← 求人一覧に戻る</a>
</div>
@endsection
