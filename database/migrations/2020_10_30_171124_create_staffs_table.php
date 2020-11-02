<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->bigIncrements('staff_id');
            $table->string('staff_name');
            $table->string('staff_email');
            $table->string('staff_password');
            $table->unsignedBigInteger('staff_designation_name');
            $table->foreign('staff_designation_name')->references('staff_designation_id')->on('staff_designations')->onDelete('cascade');
            $table->unsignedBigInteger('staff_department_name');
            $table->foreign('staff_department_name')->references('staff_department_id')->on('staff_departments')->onDelete('cascade');
            $table->string('staff_phone');
            $table->unsignedBigInteger('gender_name');
            $table->foreign('gender_name')->references('gender_id')->on('genders')->onDelete('cascade');
            $table->unsignedBigInteger('blood_name');
            $table->foreign('blood_name')->references('blood_id')->on('bloods')->onDelete('cascade');
            $table->string('staff_facebook')->nullable();
            $table->string('staff_twitter')->nullable();
            $table->string('staff_linkedin')->nullable();
            $table->string('staff_address',1000)->nullable();
            $table->string('staff_about',500)->nullable();
            $table->string('staff_image',1000)->nullable();
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
        Schema::dropIfExists('staffs');
    }
}
