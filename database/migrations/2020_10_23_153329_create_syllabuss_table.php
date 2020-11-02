<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyllabussTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syllabuss', function (Blueprint $table) {
            $table->bigIncrements('syllabus_id');
            $table->string('syllabus_title_name');
            $table->unsignedBigInteger('class_name');
            $table->foreign('class_name')->references('class_id')->on('class_names');
            $table->unsignedBigInteger('section_name');
            $table->foreign('section_name')->references('section_id')->on('section_names');
            $table->unsignedBigInteger('subject_name');
            $table->foreign('subject_name')->references('subject_id')->on('subject');
            $table->string('syllabus_image')->nullable();
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
        Schema::dropIfExists('sylabouses');
    }
}
