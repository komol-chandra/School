<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('attendance_id');
            $table->string('attendance_date');
            $table->unsignedBigInteger('class_name');
            $table->foreign('class_name')->references('class_id')->on('class_names');
            $table->unsignedBigInteger('section_name');
            $table->foreign('section_name')->references('section_id')->on('section_names');
            $table->unsignedBigInteger('student_name');
            $table->foreign('student_name')->references('student_id')->on('students');
            $table->boolean('attendance_status')->default(0);
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
        Schema::dropIfExists('attendances');
    }
}
