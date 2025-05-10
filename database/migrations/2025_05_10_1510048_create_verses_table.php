<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('verses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained('surahs')->cascadeOnDelete();
            $table->integer('verse_number');
            $table->text('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('verses');
    }
};
