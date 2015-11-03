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
            $table->double('loc_long')->nullable();
            $table->double('loc_lat')->nullable();
            $table->smallInteger('severity')->nullable();
            $table->json('weather')->nullable();
            $table->smallInteger('sound_level')->nullable();
            $table->smallInteger('light_level')->nullable();
            $table->string('name')->default('unnamed journal'); 
            $table->string('description')->nullable();
            $table->boolean('still_suffering')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->boolean('has_aura')->nullable();
            $table->string('aura_description')->nullable();
            $table->boolean('has_nausea')->nullable();
            $table->boolean('has_vomitted')->nullable();
            $table->boolean('has_light_sensativity')->nullable();
            $table->boolean('has_sound_sensativity')->nullable();
            $table->boolean('has_disrupted')->nullable();
            $table->boolean('missed_workschool')->nullable();
            $table->boolean('missed_routines')->nullable(); // ?? '|' seperated data?
            $table->string('social_plans')->nullable(); // What about social plans? missed? migraine = party time?
            $table->string('activities')->nullable(); // What about activities? what we were doign? what we couldn't do? What we plan to do?
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
