<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    
    public function testGetUsers()
    {
        USer::factory()->count(20)->create();

        $response = $this->get('/api/users');

        $response->assertStatus(200)
            ->assertJson([
                'data' => []
            ])
            ->assertJsonCount(15, 'data');
    }

    public function testGetUser()
    {
        User::factory()->count(1)->create();

        $response = $this->get('/api/users/1');

        $response->assertStatus(200)
            ->assertJson([
                'data'  => ['id' => 1]
            ]);
    }

    public function testAddUser()
    {
        $response = $this->post('/api/users', [
            'name'          => $this->faker->name,
            'last_name'     => $this->faker->lastName,
            'email'         => $this->faker->email,
            'password'      => 'secret',
            'company_name'  => $this->faker->company
        ]);

        $response->assertCreated()
            ->assertJson([
                'message'   => __('messages.users.created')
            ]);
    }

    public function testUpdateUser()
    {
        USer::factory()->count(1)->create();

        $response = $this->put('/api/users/1', [
            'name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
            'email'     => $this->faker->email,
            'password'  => 'secret',
            'company_name'  => $this->faker->company
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message'   => __('messages.users.updated')
            ]);
    }

    public function testDeleteUser()
    {
        User::factory()->count(1)->create();

        $response = $this->delete('/api/users/1');

        $response->assertStatus(200)
            ->assertJson([
                'message'    => __('messages.users.deleted')
            ]);
    }


}
