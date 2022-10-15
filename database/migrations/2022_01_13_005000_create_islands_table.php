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
        Schema::create('islands', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->unsignedBigInteger('atoll_id')->nullable();
            $table->string('atoll_code')->nullable();
            $table->string('name')->nullable();
            $table->decimal('latitude', 10,8)->nullable();
            $table->decimal('longitude', 11,8)->nullable();
            // $table->string('name_dhivehi')->nullable();
            // $table->string('atoll_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('islands');
    }
};
