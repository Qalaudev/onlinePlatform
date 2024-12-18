<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // Добавляем внешний ключ в таблицу 'course', ссылающийся на саму таблицу
            $table->foreignId('category_id')->nullable()->constrained('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // Удаляем внешний ключ и колонку
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
