<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\QrmenuService;
use App\Models\User;
use App\Models\Qrmenu;

class QrmenuServiceTest extends TestCase
{
    use RefreshDatabase;

    private $qrmenuService;

    protected function setUp() : void
    {
        parent::setUp();

        $this->qrmenuService = $this->app->make(QrmenuService::class);
    }

    public function testGetUserMenu()
    {
        User::factory()->count(1)->create();
        Qrmenu::factory()->count(1)->create();

        $menu = $this->qrmenuService->getUserMenu(1);

        $this->assertTrue(strlen($menu->name) > 0);
    }

    public function testGetMenu()
    {
        User::factory()->count(1)->create();
        Qrmenu::factory()->count(1)->create();

        $menu = $this->qrmenuService->getMenu(1);

        $this->assertTrue(strlen($menu->name) > 0);
    }

    public function testAddMenu()
    {
        User::factory()->count(1)->create();

        $menu = $this->qrmenuService->addMenu([
            'name'          => 'testing menu',
            'manager_id'    => 1
        ]);

        $this->assertTrue($menu->name === 'testing menu');
    }

    public function testUpdateMenu()
    {
        User::factory()->count(1)->create();
        Qrmenu::factory()->count(1)->create();

        $updated = $this->qrmenuService->updateMenu(1, [
            'name'          => 'updated menu',
            'manager_id'    => 1
        ]);

        $this->assertTrue($updated);
    }

    public function testDeleteMenu()
    {
        User::factory()->count(1)->create();
        Qrmenu::factory()->count(1)->create();

        $deleted = $this->qrmenuService->deleteMenu(1);

        $this->assertTrue($deleted);
    }



}
