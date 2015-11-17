<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalMedicinePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_medicine', function (Blueprint $table) {
            $table->integer('journal_id')->unsigned()->index();
            $table->string('amount_taken')->nullable(); // How do you represent 1mg/mL vs 5mL at 1mg/mL vs 5cc vs 1/4 teaspoon etc etc with only an integer?
                                                        /*
                                                         * The reasoning was having a quantum to be able to work into the algorithm.
                                                         * There would have to be some data manipulation before it was entered into the db.
                                                         * An example implementation would be: user enters in the number 5 and selects the unit of measurement mL
                                                         * We just assume that the substance has the density of water
                                                         * The backend then transforms this into a common type milligrams (5000mg) and stores that into the database.
                                                         * Too much to implement atm though.
                                                         */
            $table->dateTime('time_taken')->nullable(); // manually fill date
            $table->integer('medicine_id')->unsigned()->index();
        
            // Foreign Keys
            $table->foreign('journal_id')->references('id')->on('journals')->onDelete('cascade');
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('journal_medicine');
    }
}
