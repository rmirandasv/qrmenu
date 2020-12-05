<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Qrmenu;
use App\Models\QrmenuPage as QrmenuPageModel;
use Tests\TestCase;

class QrmenuPageTest extends TestCase
{
   use RefreshDatabase, WithFaker; 

   protected function setUp():void
   {
       parent::setUp();

       User::factory()->count(1)->create();
       Qrmenu::factory()->count(1)->create();
       QrmenuPageModel::factory()->count(10)->create();
   }

   public function testGetMenuPages()
   {
       $response = $this->get('/api/qrmenus/1/pages');

       $response->assertStatus(200)
            ->assertJson([
                'data'  => []
            ]);
   }

   public function testGetMenuPage()
   {
       $response = $this->get('/api/qrmenus/1/pages/1');

       $response->assertStatus(200)
            ->assertJson([
                'data' => []
            ]);
   }

   public function testAddMenuPage()
   {
       $response = $this->post('/api/qrmenus/1/pages', [
           'name'       => $this->faker->name,
           'qrmenu_id'  => 1
       ]);

       $response->assertCreated()
            ->assertJson([
                'message'   => __('messages.qrmenupages.created')
            ]);
   }

   public function testUpdateMenuPage()
   {
       $response = $this->put('/api/qrmenus/1/pages/1', [
           'name'       => $this->faker->name,
           'qrmenu_id'  => 1
       ]);

       $response->assertStatus(200)
            ->assertJson([
                'message'   => __('messages.qrmenupages.updated')
            ]);
   }

   public function testDelteMenuPage()
   {
       $response = $this->delete('/api/qrmenus/1/pages/1');

       $response->assertStatus(200)
       ->assertJson([
           'message'    => __('messages.qrmenupages.deleted')
       ]);
   }

}
