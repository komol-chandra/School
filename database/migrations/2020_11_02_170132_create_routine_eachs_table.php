<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutineEachsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routine_eachs', function (Blueprint $table) {
            $table->bigIncrements('each_id');
            $table->unsignedBigInteger('base_id');
            $table->foreign('base_id')->references('base_id')->on('routine_bases');
            $table->unsignedBigInteger('day_name');
            $table->foreign('day_name')->references('day_id')->on('days');
            $table->unsignedBigInteger('teacher_name');
            $table->foreign('teacher_name')->references('teacher_id')->on('teachers');
            $table->unsignedBigInteger('subject_name');
            $table->foreign('subject_name')->references('subject_id')->on('subject');
            $table->unsignedBigInteger('classroom_name');
            $table->foreign('classroom_name')->references('classroom_id')->on('class_room');
            $table->string('sarting_hour');
            $table->string('ending_hour');
            $table->string('duration');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('routine_eachs');
    }
}
