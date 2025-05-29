@extends('layouts.app') {{-- レイアウトに合わせて調整 --}}

@section('content')
    <h2>お気に入り求人一覧</h2>

    @if ($favorites->isEmpty())
        <p>お気に入りに登録された求人はありません。</p>
    @else
        <ul>
            @foreach ($favorites as $favorite)
                <li>
                    <a href="{{ route('user.recruits.show', $favorite->recruit->id) }}">
                        {{ $favorite->recruit->title ?? '（削除された求人）' }}
                    </a>
                    <span>登録日：{{ $favorite->created_at->format('Y年m月d日') }}</span>

                      {{-- お気に入り解除 --}}
                    <form method="POST" action="{{ route('user.recruits.favorite.destroy', $favorite->recruit->id) }}">
                        @csrf
                        <button type="submit" onclick="return confirm('お気に入りから解除しますか？')">

                        </button>
                    </form>

                </li>
            @endforeach
        </ul>
    @endif
@endsection
