<?php

use Illuminate\Database\Seeder;

class SeedDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voidB
     */
    
    // Get a random value bewtween 0 and 1
    private function rf($min = 0, $max = 1)
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }
    
    public function run()
    {
        factory(App\User::class, 1000)->create()->each(function($user){
            
            for($chance = 1, $i = 0; $i < 80; $i++, $chance *= .10) {
                
                if($chance > rf()) continue; // skip this pass
                
                $journal = factory(App\Journal::class)->make();
                $user->journals()->save($journal);
                
//                for($j = 0; $j < 7; $j++) {
//                    $medicine = factory(App\Medicine::class)->make();
//                    $user->medicines()->save($medicine);
//                    
//                    $trigger = factory(App\Trigger::class)->make();
//                    $user->triggers()->save($trigger);
//                     
//                    $notes = factory(App\Note::class)->make();
//                    $user->notes()->save($notes);
//                    
//                    $journal->medicines()->attach($medicine);
//                    $journal->triggers()->attach($trigger);
//                    $journal->notes()->attach($notes);
//                }
                
                // varience in number of records with diminishing returns
                for( $chance = 0.9, $j = 0 ; $j < 10; $j++, $chance *= .20)
                {
                    if($chance > rf()) continue; // skip this pass

                    $medicine = factory(App\Medicine::class)->make();
                    $user->medicines()->save($medicine);
                    
                    $journal->medcines()->attach($medicine);                    
                }
                
                // varience in number of records with diminishing returns
                for( $chance = 0.9, $j = 0 ; $j < 10; $j++, $chance *= .30)
                {
                    if($chance > rf()) continue; // skip this pass

                    $trigger = factory(App\Trigger::class)->make();
                    $user->triggers()->save($trigger);
                    
                    $journal->medcines()->attach($trigger);                    
                }
                
                // varience in number of records with diminishing returns
                for( $chance = 0.9, $j = 0 ; $j < 10; $j++, $chance *= .50)
                {
                    if($chance > rf()) continue; // skip this pass

                    $note = factory(App\Note::class)->make();
                    $user->notes()->save($note);
                    
                    $journal->notes()->attach($note);                    
                }
                
                // varience in number of records with diminishing returns
                for( $chance = 0.9, $j = 0 ; $j < 10; $j++, $chance *= .50)
                {
                    if($chance > rf()) continue; // skip this pass
                    
//                    $user->common_triggers()->save($faker->randomElement(CommonTriggers::all()->lists('id')));
                    
                    $journal->common_triggers()->attach($faker->randomElement(CommonTriggers::all()->lists('id')));                    
                }
            }
        });
    }
}
