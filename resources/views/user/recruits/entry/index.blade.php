@extends('user.recruits.user')

@section('content')
    <h2>応募済み求人一覧</h2>

    @if($applies->isnull())
        <p>応募した求人はありません。</p>
    @else
        <ul>
            @foreach($applies as $apply)
                <li>
                    <a href="{{ route('user.recruits.show', $apply->recruit->id) }}">
                        {{ $apply->recruit->name ?? '（削除された求人）' }}
                    </a>
                    <span>応募日：{{ $apply->created_at->format('Y年m月d日') }}</span>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
