<?php

namespace App\Models;
use App\Models\Auth;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    protected $fillable = ['user_id', 'recruit_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recruit()
    {//リレーション
        return $this->belongsTo(Recruit::class);
    }


    public function destroy($recruit)
{
    $user = Auth::user();

    $favorite = Favorite::where('user_id', $user->id)
        ->where('recruit_id', $recruit->id)
        ->first();

    if ($favorite) {
        $favorite->delete();
        return back()->with('success', 'お気に入りを解除しました');
    }

    return back()->with('error', 'お気に入り登録が見つかりませんでした');
}
}
