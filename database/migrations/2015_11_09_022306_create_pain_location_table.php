<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePainLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pain_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location')->unique()->index();
        });
        
        DB::table('pain_locations')->insert([
            ['location' => 'left forehead'],
            ['location' => 'center forehead'],
            ['location' => 'right forehead'],
            ['location' => 'left sinus'],
            ['location' => 'right sinus'],
            ['location' => 'left temple'],
            ['location' => 'right temple'],
            ['location' => 'back upper neck'],
            ['location' => 'back lower neck'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('pain_locations');
    }
}
