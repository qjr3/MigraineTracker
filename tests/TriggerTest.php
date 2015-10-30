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
        $journal = new App\Journal(['location' => 'USA']);
        $user->journals()->save($journal);
        $this->data = ['name' => 'angry babies', 'dose' => 100, 'description' => 'Small creatures filled with a hatred for all logic. Suspected to feed on the suffering of others', 'journal' => $journal->id];
        $this->post('trigger', $this->data)
            ->seeStatusCode(200);
    }

    public function testCreateTriggerWithoutJournal(){
        $this->createAndLoginWithUser();
        $this->data = ['name' => 'angry babies', 'dose' => 100, 'description' => 'Small creatures filled with a hatred for all logic. Suspected to feed on the suffering of others'];
        $this->post('trigger', $this->data)
            ->seeStatusCode(200);
    }

    public function testShowTrigger()
    {
        $trigger = $this->createTrigger();
        $route = 'trigger/' . $trigger->id;
        $this->get($route)
            ->seeStatusCode(200)
            ->seeJsonContains(['name' => 'angry babies']);
    }

    public function testUpdateTrigger()
    {
        $trigger = $this->createTrigger();
        $update = ['name' => 'mexican food', 'dose' => 1000, 'description' => 'not angry babies'];
        $route = 'trigger/' . $trigger->id;
        $this->patch($route, $update)
            ->seeInDatabase('triggers', ['name' => 'mexican food']);
    }

    public function testDestroyTrigger()
    {
        $trigger = $this->createTrigger();
        $route = 'trigger/' . $trigger->id;
        $this->delete($route)
            ->missingFromDatabase('triggers', ['name', 'angry babies']);
    }
    /*----------------------------------Not Tests---------------------------------------*/
    /**
     * @return App\Trigger
     */
    public function createTrigger()
    {
        $user = $this->createAndLoginWithUser();
        $journal = new App\Journal(['location' => 'USA']);
        $user->journals()->save($journal);
        $this->data = ['name' => 'angry babies', 'description' => 'Small creatures filled with a hatred for all logic. Suspected to feed on the suffering of others', 'journal' => $journal->id];
        $this->post('trigger', $this->data);
        $trigger = App\Trigger::where('name', 'angry babies')->first();
        return $trigger;
    }
}
