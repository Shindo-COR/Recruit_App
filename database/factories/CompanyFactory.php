<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User; // user_idの外部キー用に
use App\Models\PrefectureCategory; // prefectureの外部キー用に
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, // 連携ユーザーのFactoryを自動生成
            'name' => fake()->company,
            'information' => fake()->paragraph,
            'prefecture' => PrefectureCategory::inRandomOrder()->first()->id ?? 1, // こちらも同様にFactory作成しておく必要あり
            'filename' => fake()->image('public/storage/images', 640, 480, null, false), // 画像ファイル名（例）
            'is_recruiting' => fake()->boolean(80), // 80%の確率でtrue
            'created_at' => now(),
            'updated_at' => now(),
            //
        ];
    }
}
