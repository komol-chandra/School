<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtraFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_file_students', function (Blueprint $table) {
            $table->bigIncrements('extra_file_student_id');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->string('file_name')->nullable();
            $table->string('image_file',1000)->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('extra_file_students');
    }
}
