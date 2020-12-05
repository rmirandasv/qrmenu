<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\QrmenuPageRepository;
use App\Models\User;
use App\Models\Qrmenu;
use App\Models\QrmenuPage;

class QrmenuPageRepositoryTest extends TestCase
{
    use RefreshDatabase;
    
    private $qrmenuPageRepository;

    protected function setUp():void
    {
        parent::setUp();

        $this->qrmenuPageRepository = $this->app->make(QrmenuPageRepository::class);

       User::factory()->count(1)->create();
       Qrmenu::factory()->count(1)->create();
       QrmenuPage::factory()->count(10)->create();
    }

    public function testGetMenuPages()
    {
        $pages = $this->qrmenuPageRepository->getMenuPages(1);

        $this->assertTrue($pages->count() > 0);
    }

    public function testGetMenuPage()
    {
        $page = $this->qrmenuPageRepository->getMenuPage(1);

        $this->assertTrue(strlen($page->name) > 0);
    }

    public function testAddMenuPage()
    {
        $page = $this->qrmenuPageRepository->addMenuPage([
            'name'      => 'testing page',
            'qrmenu_id' => 1
        ]);

        $this->assertTrue(strlen($page->name) > 0);
    }

    public function testUpdateMenuPage()
    {
        $updated = $this->qrmenuPageRepository->updateMenuPage(1, [
            'name'      => 'updated page',
            'qrmenu_id' => 1
        ]);

        $this->assertTrue($updated);
    }

    public function testDeleteMenuPage()
    {
        $deleted = $this->qrmenuPageRepository->deleteMenuPage(1);

        $this->assertTrue($deleted);
    }

}
