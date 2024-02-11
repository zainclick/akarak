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
        Schema::create('properties_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property');
            $table->foreign('property')->references('id')->on('properties')->onDelete('cascade');
            $table->unsignedBigInteger('agency');
            $table->foreign('agency')->references('id')->on('agencies')->onDelete('cascade');
            $table->unsignedBigInteger('agent');
            $table->foreign('agent')->references('id')->on('agents')->onDelete('cascade');
            $table->string('expiry_date')->nullable();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
