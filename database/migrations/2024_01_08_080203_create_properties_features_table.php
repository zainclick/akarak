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
        Schema::create('properties_features_icons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('feature');
            $table->foreign('feature')->references('id')->on('features')->onDelete('cascade');
            $table->unsignedBigInteger('property');
            $table->foreign('property')->references('id')->on('properties')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties_features');
    }
};
