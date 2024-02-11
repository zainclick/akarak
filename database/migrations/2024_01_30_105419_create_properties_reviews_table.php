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
        Schema::create('properties_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property');
            $table->foreign('property')->references('id')->on('properties')->onDelete('cascade');
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('front_users')->onDelete('cascade');
            $table->string('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties_reviews');
    }
};
