<h1>企業情報</h1>


<div>
    <a href='/admin/companies'>戻る</a>
    <a href='/admin/companies/{{$company->id}}/edit'>編集</a>
    <a href='/admin/companies/{{$company->id}}/destroy'>削除</a>
</div>

<table>
    <tr>
        <td>id</td>
        <td>{{$company->user_id}}</td>
    </tr>
    <tr>
        <td>企業名</td>
        <td>{{$company->name}}</td>
    </tr>
    <tr>
        <td>メールアドレス</td>
        <td>{{$company->users?->email}}</td>
    </tr>
    <tr>
        <td>電話番号</td>
        <td>{{$company->users?->phone_num}}</td>
    </tr>
    <tr>
        <td>本拠地</td>
        <td>{{$company->prefecture?->name}}</td>
    </tr>
    <tr>
        <td>企業詳細</td>
        <td>{{$company->information}}</td>
    </tr>
</table>
