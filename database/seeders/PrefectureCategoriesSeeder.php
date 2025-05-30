<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PrefectureCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('prefecture_categories')->insert([
            ['name'=>'愛知県',
            'sort_order'=>1],

            ['name'=>'青森県',
            'sort_order'=>2],

            ['name'=>'秋田県',
            'sort_order'=>3],

            ['name'=>'石川県',
            'sort_order'=>4],

            ['name'=>'茨城県',
            'sort_order'=>5],

            ['name'=>'岩手県',
            'sort_order'=>6],

            ['name'=>'愛媛県',
            'sort_order'=>7],

            ['name'=>'大分県',
            'sort_order'=>8],

            ['name'=>'大阪府',
            'sort_order'=>9],

            ['name'=>'岡山県',
            'sort_order'=>10],

            ['name'=>'沖縄県',
            'sort_order'=>11],

            ['name'=>'香川県',
            'sort_order'=>12],

            ['name'=>'鹿児島県',
            'sort_order'=>13],

            ['name'=>'神奈川県',
            'sort_order'=>14],

            ['name'=>'岐阜県',
            'sort_order'=>15],

            ['name'=>'京都府',
            'sort_order'=>16],

            ['name'=>'熊本県',
            'sort_order'=>17],

            ['name'=>'群馬県',
            'sort_order'=>18],

            ['name'=>'高知県',
            'sort_order'=>19],

            ['name'=>'埼玉県',
            'sort_order'=>20],

            ['name'=>'佐賀県',
            'sort_order'=>21],

            ['name'=>'滋賀県',
            'sort_order'=>22],

            ['name'=>'静岡県',
            'sort_order'=>23],

            ['name'=>'島根県',
            'sort_order'=>24],

            ['name'=>'千葉県',
            'sort_order'=>25],

            ['name'=>'東京都',
            'sort_order'=>26],

            ['name'=>'徳島県',
            'sort_order'=>27],

            ['name'=>'栃木県',
            'sort_order'=>28],

            ['name'=>'鳥取県',
            'sort_order'=>29],

            ['name'=>'富山県',
            'sort_order'=>30],

            ['name'=>'長崎県',
            'sort_order'=>31],

            ['name'=>'長野県',
            'sort_order'=>32],

            ['name'=>'奈良県',
            'sort_order'=>33],

            ['name'=>'新潟県',
            'sort_order'=>34],

            ['name'=>'兵庫県',
            'sort_order'=>35],

            ['name'=>'広島県',
            'sort_order'=>36],

            ['name'=>'福井県',
            'sort_order'=>37],

            ['name'=>'福岡県',
            'sort_order'=>38],

            ['name'=>'福島県',
            'sort_order'=>39],

            ['name'=>'北海道',
            'sort_order'=>40],

            ['name'=>'三重県',
            'sort_order'=>41],

            ['name'=>'宮城県',
            'sort_order'=>42],

            ['name'=>'宮崎県',
            'sort_order'=>43],

            ['name'=>'山形県',
            'sort_order'=>44],

            ['name'=>'山口県',
            'sort_order'=>45],

            ['name'=>'山梨県',
            'sort_order'=>46],

            ['name'=>'和歌山県',
            'sort_order'=>47],
        ]);
    }
}
