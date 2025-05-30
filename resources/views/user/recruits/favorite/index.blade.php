@extends('user.recruits.user')


@section('content')
    <h2>お気に入り求人一覧</h2>

    {{-- @if
    {{-- ($favorites->isnull()) --}}
        {{-- <p>お気に入りに登録された求人はありません。</p> --}}
    {{-- @else --}}
        <ul>
            @foreach ($favorites as $favorite)
                <li>
                    <a href="{{ route('user.recruits.show', $favorite->recruit->id) }}">
                        {{-- {{ $favorite->recruit->name ?? '（削除された求人）' }} --}}
                    </a>
                    <span>登録日：{{ $favorite->created_at->format('Y年m月d日') }}</span>

                    {{-- お気に入り削除 --}}
                    <form method="POST" action="{{ route('user.recruits.favorite.destroy', $favorite->recruit->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">お気に入り解除</button>
                    </form>


                </li>
            @endforeach
        </ul>
    {{-- @endif --}}
@endsection
