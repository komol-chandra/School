<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('teacher_id');
            $table->string('teacher_name');
            $table->string('teacher_email');
            $table->string('teacher_password');
            $table->unsignedBigInteger('teacher_designation_name');
            $table->foreign('teacher_designation_name')->references('teacher_designation_id')->on('teacher_designations')->onDelete('cascade');
            
            $table->unsignedBigInteger('department_name');
            $table->foreign('department_name')->references('department_id')->on('department')->onDelete('cascade');
            $table->string('teacher_phone');
            $table->unsignedBigInteger('gender_name');
            $table->foreign('gender_name')->references('gender_id')->on('genders')->onDelete('cascade');
            $table->unsignedBigInteger('blood_name');
            $table->foreign('blood_name')->references('blood_id')->on('bloods')->onDelete('cascade');
            $table->string('teacher_facebook')->nullable();
            $table->string('teacher_twitter')->nullable();
            $table->string('teacher_linkedin')->nullable();
            $table->string('teacher_address',1000)->nullable();
            $table->string('teacher_about',500)->nullable();
            $table->string('teacher_image',1000)->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
