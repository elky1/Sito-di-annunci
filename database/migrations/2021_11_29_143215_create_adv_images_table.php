<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adv_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file');
            $table->unsignedBigInteger('adv_id');
            $table->foreign('adv_id')->references('id')->on('advs');
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
        Schema::dropIfExists('adv_images');
    }
}
