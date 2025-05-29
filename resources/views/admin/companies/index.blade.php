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
