<?php
//
//use Illuminate\Foundation\Testing\WithoutMiddleware;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Foundation\Testing\DatabaseTransactions;
//
//class MedicineTest extends TestCase
//{
//    use DatabaseTransactions;
//    //use WithoutMiddleware;
//    private $data;
//
//
//    /**
//     * A basic test example.
//     *
//     * @return void
//     */
//    public function testExample()
//    {
//        $this->assertTrue(true);
//    }
//
//    public function testCreateMedicineWithJournal(){
//        $user = $this->createAndLoginWithUser();
//        $journal = new App\Journal(['location' => 'USA']);
//        $user->journals()->save($journal);
//        $this->data = ['name' => 'cocaine', 'dose' => 100, 'description' => 'A highly addictive white powdery substance. Known to increase aggression and increase focus.', 'journal' => $journal->id];
//        $this->post('medicine', $this->data)
//             ->seeStatusCode(200);
//    }
//
//    public function testCreateMedicineWithoutJournal(){
//        $this->createAndLoginWithUser();
//        $this->data = ['name' => 'cocaine', 'dose' => 100, 'description' => 'A highly addictive white powdery substance. Known to increase aggression and increase focus.'];
//        $this->post('medicine', $this->data)
//            ->seeStatusCode(200);
//    }
//
//    public function testShowMedicine()
//    {
//        $medicine = $this->createMedicine();
//        $route = 'medicine/' . $medicine->id;
//        $this->get($route)
//            ->seeStatusCode(200)
//            ->seeJsonContains(['name' => 'cocaine']);
//    }
//
//    public function testUpdateMedicine()
//    {
//        $medicine = $this->createMedicine();
//        $update = ['name' => 'heroin', 'dose' => 1000, 'description' => 'not cocaine'];
//        $route = 'medicine/' . $medicine->id;
//        $this->patch($route, $update)
//            ->seeInDatabase('medicines', ['name' => 'heroin']);
//    }
//
//    public function testDestroyMedicine()
//    {
//        $medicine = $this->createMedicine();
//        $route = 'medicine/' . $medicine->id;
//        $this->delete($route)
//            ->missingFromDatabase('medicines', ['name', 'cocaine']);
//    }
///*----------------------------------Not Tests---------------------------------------*/
//    /**
//     * @return App\Medicine
//     */
//    public function createMedicine()
//    {
//        $user = $this->createAndLoginWithUser();
//        $journal = new App\Journal(['location' => 'USA']);
//        $user->journals()->save($journal);
//        $this->data = ['name' => 'cocaine', 'dose' => 100, 'description' => 'A highly addictive white powdery substance. Known to increase aggression and increase focus.', 'journal' => $journal->id];
//        $this->post('medicine', $this->data);
//        $medicine = App\Medicine::where('name', 'cocaine')->first();
//        return $medicine;
//    }
//}
