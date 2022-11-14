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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('brand')->nullable();
            $table->string('model_number')->nullable();
            $table->double('price',10,2,true)->nullable();
            $table->string('selling_price')->nullable();
            $table->string('list_price')->nullable();
            $table->text('images')->nullable();
            $table->text('about')->nullable();
            $table->text('specification')->nullable();
            $table->text('technical_details')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->text('description')->nullable();
            $table->text('description_delta')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('condition')->nullable();
            $table->string('selling_format')->nullable();
            $table->unsignedInteger('duration')->nullable();//days
            $table->datetime('list_till')->nullable();
            $table->string('tax')->nullable();
            $table->unsignedInteger('likes_count')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('seller_id')->references('id')->on('stores');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
