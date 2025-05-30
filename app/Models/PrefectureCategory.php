<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; //  追加
class PrefectureCategory extends Model
{
      use HasFactory; //  追加
    protected $table = 'prefecture_categories';

    //PrefectureCategoryに対してCompanyは多のリレーション
    public function company(){
        return $this->hasMany(Company::class);
    }
}
