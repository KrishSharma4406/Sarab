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
        Schema::create('offer_sections', function (Blueprint $table) {
    $table->id();
    $table->string('badge')->nullable();
    $table->string('title');
    $table->string('highlight_text');
    $table->text('description')->nullable();
    $table->decimal('old_price', 8, 2)->nullable();
    $table->decimal('new_price', 8, 2)->nullable();
    $table->string('button_text')->nullable();
    $table->string('button_link')->nullable();
    $table->string('image')->nullable();
    $table->integer('hours')->default(8);
    $table->integer('minutes')->default(44);
    $table->integer('seconds')->default(46);
    $table->boolean('status')->default(1);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_sections');
    }
};
