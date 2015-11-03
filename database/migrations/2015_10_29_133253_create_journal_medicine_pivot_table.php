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
