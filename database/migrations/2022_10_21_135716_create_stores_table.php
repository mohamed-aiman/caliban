<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('profile_picture_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_2')->nullable();
            $table->timestamps();


            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('profile_picture_id')->references('id')->on('photos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
