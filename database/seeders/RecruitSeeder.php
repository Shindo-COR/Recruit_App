<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recruit;

class RecruitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Recruit::factory()->count(3)->create(); // 20件作成
        //
    }
}
