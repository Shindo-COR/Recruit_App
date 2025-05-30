<?php

namespace Database\Factories;


use App\Models\Recruit;
use App\Models\Company;
use App\Models\JobCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recruit>
 */
class RecruitFactory extends Factory
{
    protected $model = Recruit::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $company = Company::inRandomOrder()->first() ?? Company::factory()->create();
        $jobCategory = JobCategory::inRandomOrder()->first() ?? JobCategory::factory()->create();

        return [
            'company_id' => $company->id,// 外部キー：会社を自動生成
            'name' => fake()->jobTitle(),
            'information' => fake()->paragraph(),
            'salary' => fake()->numberBetween(200000, 600000),
            'is_recruiting' => fake()->boolean(80), // 80% 募集中
            'sort_order' => fake()->numberBetween(1, 100),
            'job_category' => $jobCategory->id,// 外部キー：カテゴリも生成
            //
        ];
    }
}
