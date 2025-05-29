<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrefectureCategory extends Model
{
    //PrefectureCategoryに対してCompanyは多のリレーション
    public function company(){
        return $this->hasMany(Company::class);
    }
}
