<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('quran_ayahs', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('global_ayah')->index();

            $table->unsignedSmallInteger('surah_no');
            $table->unsignedSmallInteger('ayah_no');

            $table->unsignedSmallInteger('page');
            $table->unsignedSmallInteger('juz');

            $table->boolean('sajda')->default(false);

            $table->text('text_uthmani');
            $table->text('text_plain');
            $table->text('text_plain_norm');

            $table->unique(['surah_no', 'ayah_no']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('quran_ayahs');
    }
};
