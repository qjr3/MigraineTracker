<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Test the homepage
     */
    public function testHome()
    {
        $this->visit('/')
            ->see('Migraine Tracker');
    }
    /*----------------Not Tests-----------------*/
    /**
     * @return App\User
     */
    public function createAndLoginWithUser()
    {
        $user = factory(App\User::class, 1)->create();
        Auth::loginUsingId($user->id);
        return $user;
    }
}
