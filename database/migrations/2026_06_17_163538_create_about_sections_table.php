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
    Schema::create('about_sections', function (Blueprint $table) {

        $table->id();

        $table->string('small_title')->nullable();

        $table->string('title_line_1')->nullable();

        $table->string('title_highlight')->nullable();

        $table->text('description')->nullable();

        $table->string('experience_years')->nullable();

        $table->string('experience_text')->nullable();

        $table->string('main_image')->nullable();

        $table->string('small_image')->nullable();

        $table->string('feature1_title')->nullable();
        $table->text('feature1_description')->nullable();

        $table->string('feature2_title')->nullable();
        $table->text('feature2_description')->nullable();

        $table->string('feature3_title')->nullable();
        $table->text('feature3_description')->nullable();

        $table->string('button_text')->nullable();
        $table->string('button_link')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
