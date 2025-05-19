<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->foreignId('root_id')->constrained('roots')->cascadeOnDelete();
            $table->foreignId('verse_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('surah_id')->nullable()->constrained()->nullOnDelete();
            $table->text('word')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->text('word_tashkeel')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('words');
    }
};
