<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    //
       protected $fillable = ['user_id', 'recruit_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recruit()
    {
        return $this->belongsTo(Recruit::class);
    }
}
