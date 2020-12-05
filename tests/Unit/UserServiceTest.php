<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserServiceTest extends TestCase
{
    
    use RefreshDatabase;

    private $userService;

    protected function setUp():void
    {
        parent::setUp();

        $this->userService = $this->app->make('App\Services\UserService');
    }

    public function testGetAllUsers()
    {
        User::factory()->count(20)->create();

        $users = $this->userService->getAllUsers();

        $this->assertTrue($users->count() > 0);
    }

    public function testGetUser()
    {
        User::factory()->count(1)->create();

        $user = $this->userService->getUser(1);

        $this->assertTrue(strlen($user->email) > 0);
    }

    public function testAddUser()
    {
        $user = $this->userService->addUser([
            'name'          => 'Ronald',
            'last_name'     => 'Miranda',
            'email'         => 'email@email.coom',
            'company_name'  => 'company',
            'password'      => 'secret'
        ]);

        $this->assertTrue($user->name === 'Ronald');
    }

    public function testUpdateUser()
    {
        User::factory()->count(1)->create();

        $updated = $this->userService->updateUser(1, [
            'name'  => 'Ronald'
        ]);

        $this->assertTrue($updated);
    }

    public function testDeleteUser()
    {
        User::factory()->count(1)->create();

        $deleted = $this->userService->deleteUSer(1);

        $this->assertTrue($deleted);
    }
    
}
