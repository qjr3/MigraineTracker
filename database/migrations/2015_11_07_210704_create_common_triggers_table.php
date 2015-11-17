<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommonTriggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_triggers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
        });
        
        $table = DB::table('common_triggers')->insert([
            ['name' => 'Sleep Problems', 'description' => 'Not enough sleep, incomplete sleep or frequent wakings.'],
            ['name' => 'Eating Schedule', 'description' => 'Not eating on a regular and/or normal schedulte.'],
            ['name' => 'Flashing Lights', 'description' => 'Seen bright flashing lights.'],
            ['name' => 'Sound', 'description' => 'Loud or pulsating sounds.'],
            ['name' => 'Odor', 'description' => 'Exposure to strong odors.'],
            ['name' => 'Red Wine', 'description' => 'Drank red wine.'],
            ['name' => 'Cheese', 'description' => 'Ate Cheese.'],
            ['name' => 'Chocolate', 'description' => 'Ate Chocolate'],
            ['name' => 'Physical Activity', 'description' => 'Extended or heavy physical activity.'],
            ['name' => 'Nitrates and Nitrites', 'description' => 'Common ingredient found in processed meats like hotdogs or bacon.'],
            ['name' => 'MSG', 'description' => 'Found commonly in Soy Sauce, Meat Tenderizers, and special Seasoning Salts.'],
            ['name' => 'Sour Cream', 'description' => 'Ate sour cream.'],
            ['name' => 'Nuts, Nut-butters', 'description' => 'Consuming nuts or nut bearing foods.'],
            ['name' => 'Sourdough break', 'description' => 'Contains active bateria some are sensitive.'],
            ['name' => 'Beans', 'description' => 'Beans, such are broadbeans, lima beans, fava beans, and snow peas contain an active toxin which causes many complications if not thoroughly cooked.'],
            ['name' => 'Dried or Tropical Fruits', 'description' => 'Raisins, Figs, papayas, avacados, red plums.'],
            ['name' => 'Citrus Fruit', 'description' => 'Oranges, Lemon, Limes, Grapefruit, Tangerine, Kumquats, Mandarin, etc.'],
            ['name' => 'Caffeine', 'description' => 'Found in tea, coffee, chocolates, pills (inlcuding some for treating headaches), and many soft drinks.'],
            ['name' => 'Alcohol', 'description' => 'Beer, hard liqour'],
            ['name' => 'Menstruation', 'description' => 'Loss of vital minerals and vitamins can cause migraines.'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('common_triggers');
    }
}
