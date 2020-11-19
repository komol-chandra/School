<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentGuardians extends Migration
{
    public function up()
    {
        Schema::create('student_guardians', function (Blueprint $table) {
            $table->bigIncrements('student_guardian_id');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->string('student_guardian_relation')->nullable();
            $table->string('student_guardian_name')->nullable();
            $table->string('student_guardian_phone')->nullable();
            $table->string('student_guardian_occupation')->nullable();
            $table->string('student_guardian_address')->nullable();
            $table->string('student_guardian_idcard',1000)->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('student_guardians');
    }
}
