<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->bigIncrements('system_id');
            $table->string('system_name')->nullable();
            $table->string('title_name')->nullable();
            $table->string('school_email')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('school_address')->nullable();
            $table->string('footer_text')->nullable();
            $table->string('footer_link')->nullable();
            $table->string('regular_logo')->nullable();
            $table->string('light_logo')->nullable();
            $table->string('small_logo')->nullable();
            $table->string('fav_icon')->nullable();
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
        Schema::dropIfExists('system_settings');
    }
}
