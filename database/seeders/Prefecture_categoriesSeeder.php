<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class Prefecture_categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('prefecture_categories')->insert([
            'name'=>'愛知県',
            'sort_order'=>1,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'青森県',
            'sort_order'=>2,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'秋田県',
            'sort_order'=>3,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'石川県',
            'sort_order'=>4
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'茨城県',
            'sort_order'=>5,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'岩手県',
            'sort_order'=>6,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'愛媛県',
            'sort_order'=>7,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'大分県',
            'sort_order'=>8,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'大阪府',
            'sort_order'=>9,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'岡山県',
            'sort_order'=>10,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'沖縄県',
            'sort_order'=>11,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'香川県',
            'sort_order'=>12,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'鹿児島県',
            'sort_order'=>13,
        ]);;

        DB::table('prefecture_categories')->insert([
            'name'=>'神奈川県',
            'sort_order'=>14,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'岐阜県',
            'sort_order'=>15,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'京都府',
            'sort_order'=>16,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'熊本県',
            'sort_order'=>17,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'群馬県',
            'sort_order'=>18,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'高知県',
            'sort_order'=>19,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'埼玉県',
            'sort_order'=>20,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'佐賀県',
            'sort_order'=>21,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'滋賀県',
            'sort_order'=>22,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'静岡県',
            'sort_order'=>23,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'島根県',
            'sort_order'=>24,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'千葉県',
            'sort_order'=>25,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'東京都',
            'sort_order'=>26,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'徳島県',
            'sort_order'=>27,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'栃木県',
            'sort_order'=>28,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'鳥取県',
            'sort_order'=>29,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'富山県',
            'sort_order'=>30,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'長崎県',
            'sort_order'=>31,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'長野県',
            'sort_order'=>32,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'奈良県',
            'sort_order'=>33,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'新潟県',
            'sort_order'=>34,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'兵庫県',
            'sort_order'=>35,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'広島県',
            'sort_order'=>36,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'福井県',
            'sort_order'=>37,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'福岡県',
            'sort_order'=>38,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'福島県',
            'sort_order'=>39,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'北海道',
            'sort_order'=>40,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'三重県',
            'sort_order'=>41,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'宮城県',
            'sort_order'=>42,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'宮崎県',
            'sort_order'=>43,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'山形県',
            'sort_order'=>44,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'山口県',
            'sort_order'=>45,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'山梨県',
            'sort_order'=>46,
        ]);

        DB::table('prefecture_categories')->insert([
            'name'=>'和歌山県',
            'sort_order'=>47,
        ]);
    }
}
