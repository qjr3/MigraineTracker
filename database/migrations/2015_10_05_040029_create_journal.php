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
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('location');
            $table->integer('severity')->nullable();
            $table->string('weather')->nullable();
            $table->integer('noise_level')->nullable();
            $table->integer('light_level')->nullable();
            $table->string('name')->default('unnamed journal'); 
            $table->string('description')->nullable();
            $table->boolean('still_suffering')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->boolean('has_aura')->nullable();
            $table->string('aura_description')->nullable();
            $table->boolean('has_nausea')->nullable();
            $table->boolean('has_vomitted')->nullable();
            $table->boolean('has_light_sensativity')->nullable();
            $table->boolean('has_sound_sensativity')->nullable();
            $table->boolean('has_disrupted')->nullable();
            $table->boolean('missed_workschool')->nullable();
            $table->string('missed_routines')->nullable(); // ?? '|' seperated data?
            $table->string('social_plans')->nullable(); // What about social plans? missed? migraine = party time?
            $table->string('activities')->nullable(); // What about activities? what we were doign? what we couldn't do? What we plan to do?
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
        Schema::drop('journals');
    }
}
