<?php

namespace Database\Factories;

use App\Models\Job_Category;
use App\Models\PrefectureCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job_Category>
 */
class JobCategoryFactory extends Factory
{
     protected $model = Job_Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
          $jobNames = [
            '営業', 'エンジニア', 'デザイナー', 'マーケティング', 'カスタマーサポート',
            '人事', '経理', '法務', '企画', '広報',
        ];

         $prefectureCategoryId = PrefectureCategory::inRandomOrder()->first()->id ?? 1;
        return [
               'name' => fake()->unique()->randomElement($jobNames),
            'sort_order' => fake()->unique()->numberBetween(1, 100),
            'prefecture_category' => $prefectureCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
            //
        ];
    }
}
