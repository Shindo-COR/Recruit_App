<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
// namespace App\Http\Controllers;
// Userディレクトリにあるのに namespace が App\Http\Controllers; のままだと、
// App\Http\Controllers\RecruitController として認識されてしまいます。
use App\Models\Favorite;
use App\Models\Recruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FavoriteController extends Controller
{
    //
    public function store(Recruit $recruit)
    {
        $user = Auth::user();

        // すでに登録済みかチェック
        $exists = Favorite::where('user_id', $user->id)
            ->where('recruit_id', $recruit->id)
            ->exists();

        if ($exists) {
            return back()->with('message', 'すでにお気に入り登録済みです');
        }

        Favorite::create([
            'user_id' => $user->id,
            'recruit_id' => $recruit->id,
        ]);

        return back()->with('success', 'お気に入りに登録しました');
    }


    public function index()
    {
        $user = Auth::user();

        // ログインユーザーのお気に入り求人を取得
        // Favoriteモデルと関連するrecruitモデルを同時に取得
        $favorites = Favorite::with('recruit')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('user.recruits.favorite.index', compact('favorites'));
    }
}
