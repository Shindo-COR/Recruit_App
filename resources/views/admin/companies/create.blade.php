<h1>新規企業登録</h1>

<form action='/admin/companies/store' method='POST'>
    @csrf
    <table border=1>
        <tr>
            <td>企業名</td>
            <td><input type='text' name='name' value={{old('name')}}></td>
        </tr>
        <tr>
            <td>メールアドレス</td>
            <td><input type='text' name='email' value={{old('email')}}></td>
        </tr>
        <tr>
            <td>電話番号</td>
            <td><input type='text' name='phone_num' value={{old('phone_num')}}></td>
        </tr>
        <tr>
            <td>パスワード</td>
            <td><input type='text' name='password' value={{old('password')}}></td>
        </tr>
        <tr>
            <td>本拠地</td>
            <td><input type='text' name='prefecture' value={{old('prefecture')}}></td>
        </tr>
        <tr>
            <td>企業詳細</td>
            <td><textarea name='information' rows='5' cols='30'></textarea><td>
        </tr>
        </table>
    <input type='submit' name='submit' value='登録'>
    <button type='button' onClick='history.back()'>戻る</button>
</form>



