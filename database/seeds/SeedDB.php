<?php

use Illuminate\Database\Seeder;

class SeedDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voidB
     */
    public function run()
    {
        factory(App\User::class, 100)->create()->each(function($user){
            for($i = 0; $i < 80; $i++) {
                $journal = factory(App\Journal::class)->make();
                $user->journals()->save($journal);
                
                for($j = 0; $j < 7; $j++) {
                    $medicine = factory(App\Medicine::class)->make();
                    $user->medicines()->save($medicine);
                    
                    $trigger = factory(App\Trigger::class)->make();
                    $user->triggers()->save($trigger);
                     
                    $notes = factory(App\Note::class)->make();
                    $user->notes()->save($notes);
                    
                    $journal->medicines()->attach($medicine);
                    $journal->triggers()->attach($trigger);
                    $journal->notes()->attach($notes);
                }
                
            }
        });
    }
}
