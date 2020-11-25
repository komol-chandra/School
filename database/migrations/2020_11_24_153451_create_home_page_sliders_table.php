<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_sliders', function (Blueprint $table) {
            $table->bigIncrements('slider_id');
            $table->string('slider_title1')->nullable();
            $table->string('slider_title1_descryption')->nullable();
            $table->string('slider1_img')->nullable();
            $table->string('slider_title2')->nullable();
            $table->string('slider_title2_descryption')->nullable();
            $table->string('slider2_img')->nullable();
            $table->string('slider_title3')->nullable();
            $table->string('slider_title3_descryption')->nullable();
            $table->string('slider3_img')->nullable();
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
        Schema::dropIfExists('home_page_sliders');
    }
}
