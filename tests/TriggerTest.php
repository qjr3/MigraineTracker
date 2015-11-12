<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TriggerTest extends TestCase
{
    use DatabaseTransactions;
    //use WithoutMiddleware;
    private $data;

    public function testCreateTriggerWithJournal(){
        $user = $this->createAndLoginWithUser();
        $journal = $this->createJournal($user);
        $this->data = $this->setDataWithJournal($journal->id, 'angry babies');
        $this->post('trigger', $this->data)
            ->seeStatusCode(200);
    }

    public function testCreateTriggerWithoutJournal(){
        $this->createAndLoginWithUser();
        $this->data = $this->setData('angry babies');
        $this->post('trigger', $this->data)
            ->seeStatusCode(200);
    }

    public function testShowTrigger()
    {
        $trigger = $this->createTrigger('angry babies');
        $route = 'trigger/' . $trigger->id;
        $this->get($route)
            ->seeStatusCode(200)
            ->seeJsonContains(['name' => 'angry babies']);
    }

//    public function testAddTriggerToMultipleJournals()
//    {
//        $user = $this->createAndLoginWithUser();
//        $j1 = $this->createJournal($user);
//        $j2 = $this->createJournal($user);
//        $trigger = $this->attachAndReturnTrigger($j1, 'hot food');
//        $this->attachAndReturnTrigger($j2, 'hot food');
//        $trigger = App\Trigger::find($trigger->id);
//        var_dump($trigger->journals()->all());
//    }


    public function testUpdateTrigger()
    {
        $trigger = $this->createTrigger('angry babies');
        $update = $this->setData('mexican food');
        $route = 'trigger/' . $trigger->id;
        $this->patch($route, $update)
            ->seeInDatabase('triggers', ['name' => 'mexican food']);
    }

    public function testDestroyTrigger()
    {
        $trigger = $this->createTrigger('angry babies');
        $route = 'trigger/' . $trigger->id;
        $this->delete($route)
            ->missingFromDatabase('triggers', ['name', 'angry babies']);
    }
    /*----------------------------------Not Tests---------------------------------------*/
    /**
     * @return App\Trigger
     */
    public function createTrigger($name)
    {
        $user = $this->createAndLoginWithUser();
        $journal = $this->createJournal($user);
        $trigger = $this->attachAndReturnTrigger($journal, $name);
        return $trigger;
    }

    public function attachAndReturnTrigger($journal, $name)
    {
        $this->data = $this->setDataWithJournal($journal, $name);
        $this->post('trigger', $this->data);
        $trigger = App\Trigger::where('name', $name)->first();
        return $trigger;
    }

    public function createJournal($user)
    {
        $faker = Faker\Factory::create();
        $journal = new App\Journal(['location' => $faker->city]);
        $user->journals()->save($journal);
        return $journal;
    }

    public function setDataWithJournal($journalID, $name){
        $faker = Faker\Factory::create();
        $data = ['name' => $name, 'dose' => $faker->numberBetween(0, 10000), 'description' => $faker->paragraph(3), 'journal' => $journalID];
        return $data;
    }
    public function setData($name){
        $faker = Faker\Factory::create();
        $data = ['name' => $name, 'dose' => $faker->numberBetween(0, 10000), 'description' => $faker->paragraph(3)];
        return $data;
    }
}
