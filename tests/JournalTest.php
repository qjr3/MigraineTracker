<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JournalTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function createEmptyJournal()
    {
        $journal = new Journal;
        $this->assertFalse($journal->save());
    }

    public function viewNonJournal()
    {
        $this->get('/journal/0')->see('Whoops, looks like something went wrong.');
    }

    public function viewValidJournal()
    {
        $this->get('/journal/1')->see('Migraine Tracker');
    }


}
