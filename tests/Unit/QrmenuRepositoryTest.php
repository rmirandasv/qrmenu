<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Qrmenu;
use App\Models\User;
use App\Repositories\QrmenuRepository;

class QrmenuRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private $qrmenuRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->qrmenuRepository = $this->app->make(QrmenuRepository::class);
    }

    public function testGetUserMenu()
    {
        User::factory()->count(1)->create();
        Qrmenu::factory()->count(1)->create();

        $menu = $this->qrmenuRepository->getUserMenu(1);

        $this->assertTrue(strlen($menu->name) > 0);
    }

    public function testGetMenu()
    {
        User::factory()->count(1)->create();
        Qrmenu::factory()->count(1)->create();

        $menu = $this->qrmenuRepository->getMenu(1);

        $this->assertTrue(strlen($menu->name) > 0);
    }

    public function testAddMenu()
    {
        User::factory()->count(1)->create();

        $menu = $this->qrmenuRepository->addMenu([
            'name'          => 'testing menu',
            'manager_id'    => 1
        ]);

        $this->assertTrue($menu->name === 'testing menu');
    }

    public function testUpdateMenu()
    {
        User::factory()->count(1)->create();
        Qrmenu::factory()->count(1)->create();

        $updated = $this->qrmenuRepository->updateMenu(1, [
            'name' => 'testing update menu'
        ]);

        $this->assertTrue($updated);
    }

    public function testDeleteMenu()
    {
        User::factory()->count(1)->create();
        Qrmenu::factory()->count(1)->create();

        $deleted = $this->qrmenuRepository->deleteMenu(1);

        $this->assertTrue($deleted);
    }

}
