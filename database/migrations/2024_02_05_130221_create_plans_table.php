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
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plan_id');
            $table->string('name');
            $table->string('pilling_period');
            $table->tinyInteger('interval_count')->default(1);
            $table->unsignedBigInteger('amount');
            $table->string('currency')->default('AED');
            $table->integer('status')->default(0)->comment('0 main active');
            $table->string('slug')->unique()->index();
            $table->string('bio')->nullable();
            $table->integer('agent_count')->default(0);
            $table->integer('properties_count')->default(0);
            $table->integer('properties_features_count')->default(0);
            $table->integer('adds_count')->default(0);
            $table->string('logo')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
