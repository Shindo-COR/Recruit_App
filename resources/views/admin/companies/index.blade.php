<h1>ようこそ、{{ Auth::user()->name }} さん！</h1>
<p>メールアドレス：{{ Auth::user()->email }}</p>

  {{-- ログアウトフォーム --}}
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit"
                    style="background: none; border: none; padding: 0; color: blue; text-decoration: underline; cursor: pointer;">
                    ログアウト
                </button>
            </form>
<h1>登録中企業一覧</h1>

<p><a href='/admin/companies/create'>新規企業登録</a></p>


<table border=1>
    <tr>
        <th>企業名</th>
        <th>本拠地</th>
    @foreach($companies as $company)
        <tr>
            <td><a href='/admin/companies/{{$company->id}}'>{{$company->name}}</a></td>
            <td>{{$company->prefecture?->name}}</td>
        </tr>
    @endforeach
</table>

<p><a href='/admin/companies/destroyed'>削除済み企業一覧</a></p>
