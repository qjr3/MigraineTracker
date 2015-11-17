<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name')->default('unnamed journal'); 
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            $table->smallInteger('severity')->nullable();
            $table->smallInteger('sound_level')->nullable();
            $table->smallInteger('light_level')->nullable();
            $table->boolean('still_suffering')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->double('weather_pressure')->nullable();
            $table->double('weather_temperature')->nullable();
            $table->boolean('has_aura')->nullable();
            $table->string('aura_description')->nullable();
            $table->boolean('has_nausea')->nullable();
            $table->boolean('has_vomited')->nullable();
            $table->boolean('has_light_sensitivity')->nullable();
            $table->boolean('has_sound_sensitivity')->nullable();
            $table->boolean('has_disrupted')->nullable();
            $table->boolean('missed_workschool')->nullable();
            $table->boolean('missed_routines')->nullable(); 
            $table->boolean('missed_social')->nullable();
            $table->boolean('missed_personal_activity')->nullable(); 
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('journals');
    }
}
