<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
    $table->id();

    $table->string('title');
    $table->string('url');
    $table->integer('position')->default(0);
    $table->string('target')->default('_self');
    $table->boolean('status')->default(1);

    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};