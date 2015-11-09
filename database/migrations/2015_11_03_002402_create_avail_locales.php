<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailLocales extends Migration
{
    /**
     * 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locales', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name',5)->unique()->index();       
        });
        
        DB::table('locales')->insert(['name' => 'en-US']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locales', function (Blueprint $table) {
            $table->drop();
        });
    }
}
