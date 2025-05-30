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
            return redirect()->route('user.recruits.index')->with('success', 'お気に入りに登録しました');

        }

        Favorite::create([
            'user_id' => $user->id,
            'recruit_id' => $recruit->id,
        ]);

      return redirect()->route('user.recruits.index')->with('success', 'お気に入りに登録しました');

    }


    public function index()
    {
        $user = Auth::user();

        // ログインユーザーのお気に入り求人を取得
        // Favoriteモデルと関連するrecruitモデルを同時に取得
        $favorites = Favorite::with('recruit')
            ->where('user_id', $user->id)
            ->latest()
            ->first();

        return view('user.recruits.favorite.index', compact('favorites'));
    }

    public function destroy($recruitId)
    {
        $user = Auth::user();

        $favorite = Favorite::where('user_id', $user->id)
            ->where('recruit_id', $recruitId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return back()->with('success', 'お気に入りを解除しました');
        }

        return redirect('user.recruits.favorite.index')->with('error', 'お気に入り登録が見つかりませんでした');
    }
}
