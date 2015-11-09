<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotPainLocationJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pain_location_journal', function (Blueprint $table) {
            $table->integer('journal_id')->unsigned()->index();
            $table->integer('pain_location_id')->unsigned()->index();
            
            $table->primary(['journal_id', 'pain_location_id']);
        
            // Foreign Keys
            $table->foreign('pain_location_id')->references('id')->on('pain_locations');
            $table->foreign('journal_id')->references('id')->on('journals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Scheme::drop('pain_location_journal');
    }
}
