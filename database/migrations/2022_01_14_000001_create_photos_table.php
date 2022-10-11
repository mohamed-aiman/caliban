

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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->text('file_name')->nullable();
            $table->text('url')->nullable();
            $table->text('large_url')->nullable();
            $table->text('medium_url')->nullable();
            $table->text('thumbnail_url')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); //+@todo not null
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
        Schema::dropIfExists('photos');
    }
};
