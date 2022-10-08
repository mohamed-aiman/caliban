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
            $table->string('name')->nullable();
            $table->string('mtime')->nullable();
            $table->text('images')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedTinyInteger('level')->nullable();
            $table->unsignedBigInteger('category')->nullable();
            $table->string('category_name')->nullable();
            $table->unsignedBigInteger('sub_category')->nullable();
            $table->string('sub_category_name')->nullable();
            $table->unsignedBigInteger('third_level_category')->nullable();
            $table->string('third_level_category_name')->nullable();
            $table->unsignedBigInteger('fourth_level_category')->nullable();
            $table->string('fourth_level_category_name')->nullable();
            $table->unsignedBigInteger('fifth_level_category')->nullable();
            $table->string('fifth_level_category_name')->nullable();
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
