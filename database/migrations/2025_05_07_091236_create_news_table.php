<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->unique(); // Título de la noticia
            $table->text('content');      // Contenido html o texto largo
            // $table->foreignId('user_id')->constrained(); // Profesor que publica
            $table->boolean('is_published')->default(false); // Está publicada?
            $table->timestamp('published_at')->nullable(); // Fecha de publicación
            $table->softDeletes(); // (borrado lógico)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};