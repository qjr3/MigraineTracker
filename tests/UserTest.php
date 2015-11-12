<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class UserTest extends TestCase
{
	use DatabaseTransactions;

    /**
    * Test register link from homepage and check valid page
    */
    public function testLinkFromHome()
    {
    	$this->visit('/')
			 ->click('Sign Up')
			 ->seePageIs('/register');
    }

    /**
    * Create a test user with correct information and check valid page
    */
    public function testNewUserRegistrationPageSuccess()
    {
    	$this->visit('/register')
			 ->type('Test', 'name')
			 ->type('email@test.com', 'email')
			 ->type('password', 'password')
			 ->type('password', 'password_confirmation')
			 ->press('Create New Account')
			 ->seePageIs('/home'); // redirected to homepage
    }

    /**
    * Create a test user with incorrect passwords
    */
    public function testNewUserRegistrationIncorrectMatchingPasswords()
    {
    	$this->visit('/register')
			 ->type('Test', 'name')
			 ->type('email@test.com', 'email')
			 ->type('password', 'password')
			 ->type('password2', 'password_confirmation')
			 ->press('Create New Account')
			 ->see('The password confirmation does not match.');
    }

	/**
	 * Create a test user with incorrect password length
	 */
	public function testNewUserRegistrationPasswordLengthFail()
	{
		$this->visit('/register')
			->type('Test', 'name')
			->type('email@test.com', 'email')
			->type('pas', 'password')
			->type('pas', 'password_confirmation')
			->press('Create New Account')
			->see('The password must be at least 6 characters.');
	}

	/**
	 * Create a test user with incorrect password length
	 */
	public function testNewUserRegistrationEmailFail()
	{
		$this->visit('/register')
			->type('Test', 'name')
			->type('email@test', 'email')
			->type('password', 'password')
			->type('password', 'password_confirmation')
			->press('Create New Account')
			->see('The email must be a valid email address.');
	}

	/**
	 * Create a test user with incorrect password length
	 */
	public function testDestroyUser()
	{
		$user = $this->createAndLoginWithUser();

		$route = 'user/' . $user->id;
        $this->delete($route)
            ->missingFromDatabase('users', ['id', $user->id]);

	}

    /**
    * Create a test user with correct information and test the database
    */
    public function testNewUserDatabaseSuccess()
    {
    	$this->visit('/register')
			 ->type('DBTest', 'name')
			 ->type('DBemail@test.com', 'email')
			 ->type('password', 'password')
			 ->type('password', 'password_confirmation')
			 ->press('Create New Account')
			 ->seeInDatabase('users', ['email' => 'DBemail@test.com']); // redirected to homepage
    }

     /**
    * Create user and access profile
    */
    public function testAuthorizedUser()
    {
		$user = factory(User::class, 1)->create();
    	$this->visit('/user/' . $user->id)
			 ->see($user->id);
    }

    /**
    * Create a user and access another user's profile
    */
    public function testUnauthorizedUser()
    {
		$user1 = $this->createAndLoginWithUser();
		$user2 = factory(User::class, 1)->create();

    	$this->visit('/user/' . $user2->id)
			 ->see('You seem to have gotten lost...let me help you find your way home.');
    }
}
