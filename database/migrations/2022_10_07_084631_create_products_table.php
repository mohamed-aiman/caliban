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
            $table->text('details');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
