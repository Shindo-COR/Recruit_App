@extends('recruits.user')
@section('content')
<h2>退会確認</h2>

<p>退会するとすべての情報が削除され、元に戻すことはできません。本当によろしいですか？</p>

<form action="{{ route('user.quit.store') }}" method="POST">
    @csrf
    <button type="submit">退会する</button>
</form>

<a href="{{ route('user.recruits.index') }}">キャンセルして戻る</a>
@endsection
