<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXtblJournalMedicine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_journal_medicine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('journal_id')->unsigned();
            $table->integer('medicines_id')->unsigned();
            $table->foreign('journal_id')->references('id')->on('journal');
            $table->foreign('medicines_id')->references('id')->on('medicines');
            $table->datetime('last_taken')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('x_journal_medicine');
    }
}
