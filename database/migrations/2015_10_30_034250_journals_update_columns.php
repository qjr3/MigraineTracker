<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JournalsUpdateColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('journals', function (Blueprint $table) {
            $table->integer('triggers_id')->unsigned()->nullable();
            $table->integer('medicines_id')->unsigned()->nullable();
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
            $table->foreign('triggers_id')->references('id')->on('journal_trigger');
            $table->foreign('medicines_id')->references('id')->on('journal_medicine');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('journals', function (Blueprint $table) {
            $table->dropColumn(
                [
                    'triggers_id', 
                    'medicines_id', 
                    'name', 
                    'description',
                    'still_suffering',
                    'start_time',
                    'end_time',
                    'has_aura',
                    'aura_description',
                    'has_nausea',
                    'has_vomitted',
                    'has_light_sensativity',
                    'has_sound_sensativity',
                    'has_disrupted',
                    'missed_workschool',
                    'missed_routines',
                    'social_plans',
                    'activities',
                ]);
        });
    }
}
