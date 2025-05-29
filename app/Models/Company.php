<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    //PrefectureCategoryとのリレーション
    public function prefecture(){
        return $this->belongsTo(PrefectureCategory::class);
    }

    //usersモデルと1対1のリレーション
    public function users(){
        return $this->belongsTo(User::class);
    }
}
