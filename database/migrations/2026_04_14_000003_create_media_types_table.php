<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // ex: Audio, Texte, Vidéo, PDF, EPUB
            $table->string('slug')->unique();
            $table->string('icon')->nullable(); // optionnel: icone SVG ou nom de classe
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Ajouter la colonne media_type_id dans la table books
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('media_type_id')->nullable()->after('type')->constrained('media_types')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['media_type_id']);
            $table->dropColumn('media_type_id');
        });
        Schema::dropIfExists('media_types');
    }
};
