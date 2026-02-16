<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('quran_uthmani_tokens', function (Blueprint $table) {
            $table->id();

            $table->foreignId('quran_ayah_id')
                ->constrained('quran_ayahs')
                ->cascadeOnDelete();

            $table->string('old_ayah_id')->index();

            $table->unsignedSmallInteger('pos');

            $table->string('token_uthmani');
            $table->string('token_uthmani_norm');
            $table->string('token_plain_norm');

            $table->string('root')->nullable();
            $table->string('align_tag')->nullable();

            $table->index([
                'token_uthmani',
                'token_uthmani_norm',
                'token_plain_norm'
            ]);

            $table->index(['quran_ayah_id', 'pos']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('quran_uthmani_tokens');
    }
};
