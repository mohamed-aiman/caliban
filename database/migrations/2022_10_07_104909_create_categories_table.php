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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mtime')->nullable();
            $table->text('images')->nullable();
            $table->unsignedBigInteger('category')->nullable();
            $table->unsignedBigInteger('sub_category')->nullable();
            $table->unsignedBigInteger('third_level_category')->nullable();
            $table->unsignedBigInteger('fourth_level_category')->nullable();
            $table->unsignedBigInteger('fifth_level_category')->nullable();
            $table->timestamps();

            // $table->index('category');
            // $table->index('sub_category');
            // $table->index('third_level_category');
            // $table->index('fourth_level_category');
            // $table->index('fifth_level_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
