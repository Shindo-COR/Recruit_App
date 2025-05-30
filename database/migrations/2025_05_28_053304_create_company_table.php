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
        if (!Schema::hasTable('companies')) {
            Schema::create('companies', function (Blueprint $table) {
                $table->id(); // id (int, PK)
                $table->foreignId('user_id')->constrained('users'); // owner_id (FK)
                $table->string('name'); // name
                $table->text('information'); // information
                $table->foreignId('prefecture')->constrained('prefecture_categories');
                $table->string('filename'); // filename
                $table->boolean('is_recruiting'); // is_recruiting
                $table->timestamps(); // created_at & updated_at
                // 外部キー制約（
                // $table->foreign('owner_id')->references('id')->on('users');//->onDelete('cascade');//古い書き方
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
