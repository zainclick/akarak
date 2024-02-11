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
        Schema::create('agents_languages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent');
            $table->foreign('agent')->references('id')->on('agents')->onDelete('cascade');
            $table->unsignedBigInteger('language');
            $table->foreign('language')->references('id')->on('languages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents_languages');
    }
};
