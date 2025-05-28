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
        if (!Schema::hasTable('recruits')) {
            Schema::create('recruits', function (Blueprint $table) {
                $table->id(); // id (PK)
                $table->foreignId('company_id'); // 外部キー
                $table->string('name');
                $table->text('information');
                $table->integer('salary');
                $table->boolean('is_recruiting'); // 募集中かどうか
                $table->integer('sort_order'); // 並び順
                // $table->foreignId('job_category');
                $table->foreignId('job_category')->constrained('job_categories');//テーブル名が job_categories を明示
                $table->timestamps(); // created_at, updated_at
                // 外部キー制約
                // $table->foreign('company_id')->references('id')->on('companies');
                // $table->foreign('job_category')->references('id')->on('job_categories');
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruits');
    }
};
