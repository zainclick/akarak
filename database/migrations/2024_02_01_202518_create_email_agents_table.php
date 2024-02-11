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
        Schema::create('email_agents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property')->nullable();
            $table->unsignedBigInteger('agent');
            $table->foreign('agent')->references('id')->on('agents')->onDelete('cascade');
            $table->string('message');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_agents');
    }
};
