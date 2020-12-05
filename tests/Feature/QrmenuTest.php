<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Qrmenu;

class QrmenuTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    private function prepare()
    {
        User::factory()->count(1)->create();
        Qrmenu::factory()->count(1)->create();
    }

    public function testGetUserMenu()
    {
        $this->prepare();

        $response = $this->get('/api/users/1/qrmenu');

        $response->assertStatus(200)
            ->assertJson([
                'data' => []
            ]);
    }

    public function testGetMenu()
    {
        $this->prepare();

        $response = $this->get('/api/qrmenus/1');

        $response->assertStatus(200)
            ->assertJson([
                'data' => []
            ]);
    }

    public function testAddMenu()
    {
        $this->prepare();

        $response = $this->post('/api/qrmenus', [
            'name'          => $this->faker->name,
            'manager_id'    => 1
        ]);

        $response->assertCreated()
            ->assertJson([
                'message' => __('messages.qrmenus.created')
            ]);
    }

    public function testUpdateMenu()
    {
        $this->prepare();

        $response = $this->put('/api/qrmenus/1', [
            'name'          => 'updated menu',
            'manager_id'    => 1
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message'   => __('messages.qrmenus.updated')
            ]);
    }

    public function testDeleteMenu()
    {
        $this->prepare();

        $response = $this->delete('/api/qrmenus/1');

        $response->assertStatus(200)
            ->assertJson([
                'message' => __('messages.qrmenus.deleted')
            ]);
    }
    
}
