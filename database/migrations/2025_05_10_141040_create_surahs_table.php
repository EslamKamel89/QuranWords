<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('surahs', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Arabic
            $table->string('name_en');
            $table->enum('type', ['meccan', 'medinan']);
            $table->integer('total_verses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('surahs');
    }
};
