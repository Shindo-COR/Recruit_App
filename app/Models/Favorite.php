<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
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



}
