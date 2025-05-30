<h1>登録中企業一覧</h1>

<p><a href='/admin/companies/create'>新規企業登録</a></p>

<form action='/admin/companies' method='get'>
    @csrf
    <p>企業一覧の表示形式を変更できます</p>
    <select name='sort'>
        <option value=''>表示形式を選択してください</option>
        <option value='addition_old'>登録日時昇順</option>
        <option value='addition_new'>登録日時降順</option>
        <option value='update_old'>最終更新日時昇順</option>
        <option value='update_new'>最終更新日時降順</option>
        <option value='prefecture_up'>都道府県五十音昇順</option>
        <option value='prefecture_down'>都道府県五十音降順</option>
    </select>
    <input type='submit' name='submit' value='表示形式を変更'>
</form>

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

<p><a href='/admin/companies/destroyed'>削除済み企業一覧</a></p>
