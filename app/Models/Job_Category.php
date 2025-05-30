<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; //  追加
class Job_Category extends Model
{//頭大文字で単数形にする
      use HasFactory; // ← 追加
    //
    protected $table = 'job_categories'; //
}
