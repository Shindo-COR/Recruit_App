<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
// namespace App\Http\Controllers;
// Userディレクトリにあるのに namespace が App\Http\Controllers; のままだと、
// App\Http\Controllers\RecruitController として認識されてしまいます。
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Apply;
use App\Models\Recruit;

class EntryController extends Controller
{
    //
    public function store($recruitId)
    {
        $user = Auth::user();

        // すでに応募していないかチェック
        $exists = Apply::where('user_id', $user->id)
            ->where('recruit_id', $recruitId)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'すでにこの求人に応募しています。');
            // リダイレクト処理を開始する。直前のページ（元いたページ）に戻る
            //セッションに 'error' というキーでメッセージを一時保存する（フラッシュデータ）
        }

        Apply::create([
            'user_id' => $user->id,
            'recruit_id' => $recruitId,
        ]);

        return redirect()->back()->with('success', '応募が完了しました！');
    }


    public function index()
    {
        // dd(Auth::check()); // true ならログイン済み、false なら未ログイン
        $user = Auth::user();

        // ユーザーが応募した求人一覧を取得
        $applies = Apply::with('recruit')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('user.recruits.entry.index', compact('applies'));
    }
}
