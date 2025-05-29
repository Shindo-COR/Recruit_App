<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    protected $fillable = [
        'recruits',
        'name',
        'information',
        'salary',
        'is_recruiting',
        'sort_order',
        'job_category'
    ];
    //
    public function applies()
    {//リレーション
        return $this->hasMany(Apply::class);
    }

}
