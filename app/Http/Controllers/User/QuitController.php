<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
// namespace App\Http\Controllers;
// Userディレクトリにあるのに namespace が App\Http\Controllers; のままだと、
// App\Http\Controllers\RecruitController として認識されてしまいます。
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuitController extends Controller
{
    //
    // 退会確認画面
    public function update()
    {
        return view('user.quit.update');
    }

    // 退会処理
    public function store(Request $request)
    {
        $user = Auth::user();

        // 退会方法：論理削除 or is_activeフラグをfalse にする等
        // ここでは論理削除を前提にします（SoftDeletes使用）
        $user->delete();

        Auth::logout();

        return redirect('/')->with('status', '退会が完了しました。');
    }
}
