<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->boolean('is_published')->default(true)->after('user_id');
            $table->timestamp('published_at')->nullable()->after('is_published');
            $table->softDeletes(); // Añade la columna deleted_at
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn(['is_published', 'published_at']);
            $table->dropSoftDeletes();
        });
    }
};