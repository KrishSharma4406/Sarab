<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opening_sections', function (Blueprint $table) {
            $table->id();

            $table->string('day_name');
            $table->string('opening_time')->nullable();
            $table->string('closing_time')->nullable();

            $table->boolean('is_closed')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opening_sections');
    }
};