<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommonTriggersXJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_triggers_journal', function (Blueprint $table) {
            $table->integer('journal_id')->unsigned()->index();
            $table->integer('common_triggers_id')->unsigned()->index();
            
            $table->primary(['journal_id', 'common_triggers_id']);
        
            // Foreign Keys
            $table->foreign('common_triggers_id')->references('id')->on('common_triggers');
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
        Schema::drop('common_triggers_journal');
    }
}
