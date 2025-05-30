<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; //  追加

class Company extends Model
{
  use HasFactory; //  追加
    protected $table = 'companies';

    //PrefectureCategoryとのリレーション
    public function prefecture(){
        return $this->belongsTo(PrefectureCategory::class);
    }

    //usersモデルと1対1のリレーション
    public function user(){
        return $this->belongsTo(User::class);
    }
}
