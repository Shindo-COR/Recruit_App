<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\prefecture_categories;

class prefecture_categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        prefecture_categories::create([
            'name'=>'愛知県',
            'sort_order'=>1,
        ]);

        prefecture_categories::create([
            'name'=>'青森県',
            'sort_order'=>2,
        ]);

        prefecture_categories::create([
            'name'=>'秋田県',
            'sort_order'=>3,
        ]);

        prefecture_categories::create([
            'name'=>'石川県',
            'sort_order'=>4
        ]);

        prefecture_categories::create([
            'name'=>'茨城県',
            'sort_order'=>5,
        ]);

        prefecture_categories::create([
            'name'=>'岩手県',
            'sort_order'=>6,
        ]);

        prefecture_categories::create([
            'name'=>'愛媛県',
            'sort_order'=>7,
        ]);

        prefecture_categories::create([
            'name'=>'大分県',
            'sort_order'=>8,
        ]);

        prefecture_categories::create([
            'name'=>'大阪府',
            'sort_order'=>9,
        ]);

        prefecture_categories::create([
            'name'=>'岡山県',
            'sort_order'=>10,
        ]);

        prefecture_categories::create([
            'name'=>'沖縄県',
            'sort_order'=>11,
        ]);

        prefecture_categories::create([
            'name'=>'香川県',
            'sort_order'=>12,
        ]);

        prefecture_categories::create([
            'name'=>'鹿児島県',
            'sort_order'=>13,
        ]);;

        prefecture_categories::create([
            'name'=>'神奈川県',
            'sort_order'=>14,
        ]);

        prefecture_categories::create([
            'name'=>'岐阜県',
            'sort_order'=>15,
        ]);

        prefecture_categories::create([
            'name'=>'京都府',
            'sort_order'=>16,
        ]);

        prefecture_categories::create([
            'name'=>'熊本県',
            'sort_order'=>17,
        ]);

        prefecture_categories::create([
            'name'=>'群馬県',
            'sort_order'=>18,
        ]);

        prefecture_categories::create([
            'name'=>'高知県',
            'sort_order'=>19,
        ]);

        prefecture_categories::create([
            'name'=>'埼玉県',
            'sort_order'=>20,
        ]);

        prefecture_categories::create([
            'name'=>'佐賀県',
            'sort_order'=>21,
        ]);

        prefecture_categories::create([
            'name'=>'滋賀県',
            'sort_order'=>22,
        ]);

        prefecture_categories::create([
            'name'=>'静岡県',
            'sort_order'=>23,
        ]);

        prefecture_categories::create([
            'name'=>'島根県',
            'sort_order'=>24,
        ]);

        prefecture_categories::create([
            'name'=>'千葉県',
            'sort_order'=>25,
        ]);

        prefecture_categories::create([
            'name'=>'東京都',
            'sort_order'=>26,
        ]);

        prefecture_categories::create([
            'name'=>'徳島県',
            'sort_order'=>27,
        ]);

        prefecture_categories::create([
            'name'=>'栃木県',
            'sort_order'=>28,
        ]);

        prefecture_categories::create([
            'name'=>'鳥取県',
            'sort_order'=>29,
        ]);

        prefecture_categories::create([
            'name'=>'富山県',
            'sort_order'=>30,
        ]);

        prefecture_categories::create([
            'name'=>'長崎県',
            'sort_order'=>31,
        ]);

        prefecture_categories::create([
            'name'=>'長野県',
            'sort_order'=>32,
        ]);

        prefecture_categories::create([
            'name'=>'奈良県',
            'sort_order'=>33,
        ]);

        prefecture_categories::create([
            'name'=>'新潟県',
            'sort_order'=>34,
        ]);

        prefecture_categories::create([
            'name'=>'兵庫県',
            'sort_order'=>35,
        ]);

        prefecture_categories::create([
            'name'=>'広島県',
            'sort_order'=>36,
        ]);

        prefecture_categories::create([
            'name'=>'福井県',
            'sort_order'=>37,
        ]);

        prefecture_categories::create([
            'name'=>'福岡県',
            'sort_order'=>38,
        ]);

        prefecture_categories::create([
            'name'=>'福島県',
            'sort_order'=>39,
        ]);

        prefecture_categories::create([
            'name'=>'北海道',
            'sort_order'=>40,
        ]);

        prefecture_categories::create([
            'name'=>'三重県',
            'sort_order'=>41,
        ]);

        prefecture_categories::create([
            'name'=>'宮城県',
            'sort_order'=>42,
        ]);

        prefecture_categories::create([
            'name'=>'宮崎県',
            'sort_order'=>43,
        ]);

        prefecture_categories::create([
            'name'=>'山形県',
            'sort_order'=>44,
        ]);

        prefecture_categories::create([
            'name'=>'山口県',
            'sort_order'=>45,
        ]);

        prefecture_categories::create([
            'name'=>'山梨県',
            'sort_order'=>46,
        ]);

        prefecture_categories::create([
            'name'=>'和歌山県',
            'sort_order'=>47,
        ]);
    }
}
