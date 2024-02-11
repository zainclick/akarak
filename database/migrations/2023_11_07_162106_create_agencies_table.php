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
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->unsignedBigInteger('package');
            $table->foreign('package')->references('id')->on('packages')->onDelete('cascade');
            $table->string('slug');
            $table->unsignedBigInteger('status')->comment('0 main active | 1 main not active');
            $table->string('logo')->nullable();
            $table->longText('bio_ar')->nullable();
            $table->longText('bio_en')->nullable();
            $table->integer('mobile');
            $table->string('address')->nullable();
            $table->unsignedBigInteger('country');
            $table->foreign('country')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('city');
            $table->foreign('city')->references('id')->on('citys')->onDelete('cascade');
            $table->string('stab')->nullable();
            $table->string('orn')->unique();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_activity')->nullable()->index();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('agencies');
    }
};
