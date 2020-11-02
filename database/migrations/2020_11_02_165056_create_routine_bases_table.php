<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutineBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routine_bases', function (Blueprint $table) {
            $table->bigIncrements('base_id');
            $table->unsignedBigInteger('class_name');
            $table->foreign('class_name')->references('class_id')->on('class_names');
            $table->unsignedBigInteger('section_name');
            $table->foreign('section_name')->references('section_id')->on('section_names');
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
        Schema::dropIfExists('routine_bases');
    }
}
