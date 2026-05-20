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
        Schema::table('books', function (Blueprint $table) {
            $table->string('designation_ar')->nullable()->after('designation');
            $table->string('designation_fr')->nullable()->after('designation_ar');
            $table->text('description_ar')->nullable()->after('description');
            $table->text('description_fr')->nullable()->after('description_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['designation_ar', 'designation_fr', 'description_ar', 'description_fr']);
        });
    }
};
