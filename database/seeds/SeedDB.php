<?php

use Illuminate\Database\Seeder;

class SeedDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function($user){
            for($i = 0; $i < 20; $i++) {
                $journal = factory(App\Journal::class)->make();
                $user->journals()->save($journal);
                for($j = 0; $j < 3; $j++) {
                    $medicine = factory(App\Medicine::class)->make();
                    $user->medicines()->save($medicine);
                    $trigger = factory(App\Trigger::class)->make();
                    $user->triggers()->save($trigger);
                    $journal->medicines()->attach($medicine);
                    $journal->triggers()->attach($trigger);
                }
            }
        });
    }
}
