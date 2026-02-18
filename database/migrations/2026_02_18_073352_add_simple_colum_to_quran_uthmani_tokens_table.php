<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('quran_uthmani_tokens', function (Blueprint $table) {
            $table->string('token_simple')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('quran_uthmani_tokens', function (Blueprint $table) {
            $table->dropColumn('token_simple');
        });
    }
};
