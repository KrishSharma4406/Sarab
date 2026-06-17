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
        Schema::create('hero_sections', function (Blueprint $table) {
    $table->id();

    $table->string('badge_text')->nullable();

    $table->string('title_line_1')->nullable();
    $table->string('title_highlight')->nullable();
    $table->string('title_line_2')->nullable();

    $table->text('description')->nullable();

    $table->string('button_text')->nullable();
    $table->string('button_link')->nullable();

    $table->string('video_text')->nullable();
    $table->string('video_url')->nullable();

    $table->string('hero_image')->nullable();

    $table->string('stat1_number')->nullable();
    $table->string('stat1_text')->nullable();

    $table->string('stat2_number')->nullable();
    $table->string('stat2_text')->nullable();

    $table->string('stat3_number')->nullable();
    $table->string('stat3_text')->nullable();

    $table->string('stat4_number')->nullable();
    $table->string('stat4_text')->nullable();

    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
