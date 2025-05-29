<h1>削除済み企業一覧</h1>

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

<a href='/admin/companies'>戻る</a>
