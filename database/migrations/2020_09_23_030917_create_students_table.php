<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            
            $table->bigIncrements('student_id');
            $table->string('student_admission_number');
            $table->string('student_roll_number');
            $table->unsignedBigInteger('class_name');
            $table->foreign('class_name')->references('class_id')->on('class_names')->onDelete('cascade');
            $table->unsignedBigInteger('section_name');
            $table->foreign('section_name')->references('section_id')->on('section_names')->onDelete('cascade');
            $table->string('student_name');
            $table->string('student_mothers_name')->nullable();
            $table->string('student_fathers_name')->nullable();
            $table->string('student_birthday_date')->nullable();
            $table->string('student_admition_date')->nullable();
            $table->integer('gender_name')->nullable();
            $table->unsignedBigInteger('blood_name')->nullable();
            $table->foreign('blood_name')->references('blood_id')->on('bloods')->onDelete('cascade');
            $table->unsignedBigInteger('category_name')->nullable();
            $table->foreign('category_name')->references('category_id')->on('category_names')->onDelete('cascade');
            $table->string('religion_name')->nullable();
            $table->string('student_phone')->nullable();
            $table->string('student_email')->nullable();
            $table->string('student_height')->nullable();
            $table->string('student_weight')->nullable();
            $table->string('student_current_address',1000)->nullable();
            $table->string('student_permanent_address',1000)->nullable();
            $table->string('student_image',1000)->nullable();
            $table->string('student_birth_certificate',1000)->nullable();
            $table->string('student_marksheet',1000)->nullable();
            $table->string('student_testimonial',1000)->nullable();
            $table->string('student_registration_card',1000)->nullable();

            $table->string('student_guardian_relation')->nullable();
            $table->string('student_guardian_name')->nullable();
            $table->string('student_guardian_phone')->nullable();
            $table->string('student_guardian_email')->nullable();
            $table->string('student_guardian_occupation')->nullable();
            $table->string('student_guardian_address')->nullable();
            $table->string('student_guardian_image',1000)->nullable();
            $table->string('student_guardian_idcard',1000)->nullable(); 
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
        Schema::dropIfExists('students');
    }
}
