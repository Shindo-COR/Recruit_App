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
{{-- 検索機能を追加 --}}
<form action='/admin/companies'>
    @csrf
    <label for='requirement'>企業検索:</label>
    <input type='text' name='requirement'>
    <input type='submit' name='submit' value='検索'>
</form>

{{-- ソート機能を追加 --}}
<form action='/admin/companies' method='get'>
    @csrf
    <label for='sort'>企業一覧の表示形式を変更できます:</label>
    <select name='sort'>
        <option value=''>表示形式一覧</option>
        <option value='addition_old'>登録日時昇順</option>
        <option value='addition_new'>登録日時降順</option>
        <option value='update_old'>最終更新日時昇順</option>
        <option value='update_new'>最終更新日時降順</option>
        <option value='prefecture_up'>都道府県五十音昇順</option>
        <option value='prefecture_down'>都道府県五十音降順</option>
    </select>
    <input type='submit' name='submit' value='表示形式を変更'>
</form>

<form action='/admin/companies'>

<table border=1>
    <tr>
        <th>id</id>
        <th>企業名</th>
        <th>本拠地</th>
        <th>登録日時</th>
        <th>最終更新日時</th>
    @foreach($companies as $company)
        <tr>
            <td>{{$company->id}}</td>
            <td><a href='/admin/companies/{{$company->id}}'>{{$company->name}}</a></td>
            <td>{{$company->prefecture?->name}}</td>
            <td>{{$company->created_at}}</td>
            <td>{{$company->updated_at}}</td>
        </tr>
    @endforeach
</table>

<p><a href='/admin/companies'>登録中企業全件表示</a></p>
<p><a href='/admin/companies/destroyed'>削除済み企業一覧</a></p>
