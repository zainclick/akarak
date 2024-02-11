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
        Schema::create('agents_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent');
            $table->foreign('agent')->references('id')->on('agents')->onDelete('cascade');
            $table->unsignedBigInteger('agency');
            $table->foreign('agency')->references('id')->on('agencies')->onDelete('cascade');
            $table->string('expiry_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents_features');
    }
};
