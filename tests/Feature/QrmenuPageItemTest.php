<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Qrmenu;
use App\Models\QrmenuPage;
use App\Models\QrmenuPageItem;

class QrmenuPageItemTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        User::factory()->count(1)->create();
        Qrmenu::factory()->count(1)->create();
        QrmenuPage::factory()->count(1)->create();
        QrmenuPageItem::factory()->count(10)->create();
    }

    public function testGetPageItems()
    {
        $response = $this->get('/api/qrmenus/1/pages/1/items');

        $response->assertStatus(200)
            ->assertJson([
                'data'  => []
            ]);
    }

    public function testGetPageItem()
    {
        $response = $this->get('/api/qrmenus/1/pages/1/items/1');

        $response->assertStatus(200)
            ->assertJson([
                'data'  => []
            ]);
    }

    public function testAddPageItem()
    {
        $response = $this->post('/api/qrmenus/1/pages/1/items', [
            'qrmenu_page_id'    => 1,
            'item_name'         => $this->faker->name,
            'item_desc'         => $this->faker->text
        ]);

        $response->assertCreated()
            ->assertJson([
                'message'   => __('messages.qrmenupageitem.created')
            ]);
    }

    public function testUpdatePageItem()
    {
        $response = $this->put('/api/qrmenus/1/pages/1/items/1', [
            'qrmenu_page_id'    => 1,
            'item_name'         => $this->faker->name,
            'item_desc'         => $this->faker->text
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message'   => __('messages.qrmenupageitem.updated')
            ]);
    }

    public function testDeletePageItem()
    {
        $response = $this->delete('/api/qrmenus/1/pages/1/items/1');

        $response->assertStatus(200)
            ->assertJson([
                'message'   => __('messages.qrmenupageitem.deleted')
            ]);
    }

}
