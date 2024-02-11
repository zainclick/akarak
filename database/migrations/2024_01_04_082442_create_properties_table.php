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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('slug')->unique()->index();
            $table->unsignedBigInteger('type');
            $table->foreign('type')->references('id')->on('propertys_typs')->onDelete('cascade');
            $table->unsignedBigInteger('property_status');
            $table->foreign('property_status')->references('id')->on('propertys_statuses')->onDelete('cascade');
            $table->string('rent_type')->nullable();
            $table->string('price');
            $table->string('area');
            $table->integer('activity_status');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->string('address');
            $table->unsignedBigInteger('city');
            $table->foreign('city')->references('id')->on('citys')->onDelete('cascade');
            $table->string('description');
            $table->integer('age');
            $table->integer('sqft');
            $table->integer('views');
            $table->string('zip');
            $table->unsignedBigInteger('agency');
            $table->foreign('agency')->references('id')->on('agencies')->onDelete('cascade');
            $table->unsignedBigInteger('agent');
            $table->foreign('agent')->references('id')->on('agents')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
