<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_routines', function (Blueprint $table) {
            $table->bigIncrements('routine_id');
            $table->unsignedBigInteger('class_name');
            $table->foreign('class_name')->references('class_id')->on('class_names');
            $table->unsignedBigInteger('section_name');
            $table->foreign('section_name')->references('section_id')->on('section_names');
            $table->unsignedBigInteger('subject_name');
            $table->foreign('subject_name')->references('subject_id')->on('subject');
            $table->unsignedBigInteger('teacher_name');
            $table->foreign('teacher_name')->references('teacher_id')->on('teachers');
            $table->unsignedBigInteger('classroom_name');
            $table->foreign('classroom_name')->references('classroom_id')->on('class_room');
            $table->unsignedBigInteger('day_name');
            $table->foreign('day_name')->references('day_id')->on('days');
            $table->unsignedBigInteger('sh_hour');
            $table->foreign('sh_hour')->references('sh_id')->on('starting_hours');
            $table->unsignedBigInteger('sm_minute');
            $table->foreign('sm_minute')->references('sm_id')->on('starting_minutes');
            $table->unsignedBigInteger('en_hour');
            $table->foreign('en_hour')->references('en_id')->on('ending_hours');
            $table->unsignedBigInteger('em_minute');
            $table->foreign('em_minute')->references('em_id')->on('ending_minutes');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('class_routines');
    }
}
