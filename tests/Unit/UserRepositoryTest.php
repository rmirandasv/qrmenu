<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\UserRepository;
use App\Models\User;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $userRepository;

   public function setUp() : void
    {
        parent::setUp();

        $this->userRepository = $this->app->make('App\Repositories\UserRepository');
    }

   public function testGetAllUsers() 
   {
        User::factory()->count(20)->create();

        $users = $this->userRepository->getAllUsers();

        $this->assertTrue($users->count() > 0);
   }

   public function testGetUser()
   {
       User::factory()->count(1)->create();

       $user = $this->userRepository->getUser(1);

       $this->assertTrue(strlen($user->email) > 0);
   }

   public function testAddUser()
   {
       $user = $this->userRepository->addUser([
           'name' => 'Ronald',
           'last_name' => 'Miranda',
           'email'  => 'testing@email.com',
           'password'   => 'secret',
           'company_name'   => 'Company'
       ]);;

       $this->assertTrue($user->name === 'Ronald');
   }

   public function testUpdateUser()
   {
       User::factory()->count(1)->create();

       $updated = $this->userRepository->updateUser(1, [
           'name' => 'Ronald'
       ]);

       $this->assertTrue($updated);
   }

   public function testDeleteUser()
   {
       User::factory()->count(1)->create();

       $deleted = $this->userRepository->deleteUSer(1);

       $this->assertTrue($deleted);
   }

}
