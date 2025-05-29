<h1>登録情報の変更</h1>


<div>
    <a href='/admin/companies/{{$company->id}}/show'>戻る</a>
</div>

<form action='/admin/companies/{{$company->id}}/update' method='POST'>
    @csrf
    <table border=1>
        <tr>
            <td>id</td>
            <td>{{$company->user_id}}</td>
        </tr>
        <tr>
            <td>企業名</td>
            <td><input type='text' name='name' value={{old('name', $company->name)}}></td>
        </tr>
        <tr>
            <td>メールアドレス</td>
            <td><input type='text' name='email' value={{old('email', $company->user?->email)}}></td>
        </tr>
        <tr>
            <td>電話番号</td>
            <td><input type='text' name='phone_num' value={{old('phone_num', $company->user?->phone_num)}}></td>
        </tr>
        <tr>
            <td>本拠地</td>
            <td><input type='text' name='prefecture' value={{old('prefecture', $company->prefecture?->name)}}></td>
        </tr>
        <tr>
            <td>企業詳細</td>
            <td><textarea name='information' rows='5' cols='30'>{{old('information', $company->information)}}</textarea></td>
        </tr>
    </table>
    <input type='submit' name='submit' value='送信'>
</form>
