<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultTriggersXJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_journal_trigger', function (Blueprint $table) {
            $table->integer('journal_id')->unsigned()->index();
            $table->integer('trigger_id')->unsigned()->index();
            
            $table->primary(['journal_id', 'trigger_id']);
        
            // Foreign Keys
            $table->foreign('trigger_id')->references('id')->on('triggers');
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
        Scheme::drop('common_journal_trigger');
    }
}
