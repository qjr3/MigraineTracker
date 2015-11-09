<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesJournalPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_notes', function (Blueprint $table) {
            $table->integer('journal_id')->unsigned()->index();
            $table->integer('notes_id')->unsigned()->index();
            
            $table->primary(['journal_id', 'notes_id']);
        
            // Foreign Keys
            $table->foreign('notes_id')->references('id')->on('notes');
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
        Scheme::drop('journal_notes');
    }
}
