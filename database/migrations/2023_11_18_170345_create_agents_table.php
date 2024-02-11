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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agency');
            $table->foreign('agency')->references('id')->on('agencies')->onDelete('cascade');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('slug');
            $table->integer('status');
            $table->unsignedBigInteger('title');
            $table->foreign('title')->references('id')->on('titles')->onDelete('cascade');
            $table->string('logo')->nullable();
            $table->string('bio_ar')->nullable();
            $table->string('bio_en')->nullable();
            $table->string('address');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile');
            $table->string('brn')->unique();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullale();
            $table->unsignedBigInteger('country');
            $table->foreign('country')->references('id')->on('countries')->onDelete('cascade');
            $table->date('since');
            $table->unsignedBigInteger('city');
            $table->foreign('city')->references('id')->on('citys')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
            $table->timestamp('last_activity')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
