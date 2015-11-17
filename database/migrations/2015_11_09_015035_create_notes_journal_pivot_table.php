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
        Schema::create('journal_note', function (Blueprint $table) {
            $table->integer('journal_id')->unsigned()->index();
            $table->integer('note_id')->unsigned()->index();
            
            $table->primary(['journal_id', 'note_id']);
        
            // Foreign Keys
            $table->foreign('note_id')->references('id')->on('notes');
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
        Schema::drop('journal_note');
    }
}
