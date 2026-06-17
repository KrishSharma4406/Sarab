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
    Schema::table('hero_sections', function (Blueprint $table) {

        $table->string('card1_title')->nullable();
        $table->string('card1_subtitle')->nullable();

        $table->string('card2_title')->nullable();
        $table->string('card2_subtitle')->nullable();

        $table->string('card3_title')->nullable();
        $table->string('card3_subtitle')->nullable();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hero_sections', function (Blueprint $table) {
            //
        });
    }
};
