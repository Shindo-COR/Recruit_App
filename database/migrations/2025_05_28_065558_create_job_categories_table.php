<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_categories', function (Blueprint $table) {
            $table->id(); // id (PK)
            $table->string('name'); // 職種名
            $table->integer('sort_order'); // 並び順

            // 外部キー：都道府県カテゴリ（例：prefecture_categoriesテーブルなど）
            $table->foreignId('prefecture_category')->constrained('prefecture_categories');

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_categories');
    }
};
