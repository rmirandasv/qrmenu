<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Qrmenu;
use App\Models\QrmenuPage;
use App\Services\QrmenuPageService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QrmenuPageServiceTest extends TestCase
{
    use RefreshDatabase;

    private $qrmenuPageService;

    protected function setUp():void
    {
        parent::setUp();

        $this->qrmenuPageService = $this->app->make(QrmenuPageService::class);

        User::factory()->count(1)->create();
        Qrmenu::factory()->count(1)->create();
        QrmenuPage::factory()->count(10)->create();
    }

    public function testGetMenuPages()
    {
        $pages = $this->qrmenuPageService->getMenuPages(1);

        $this->assertTrue($pages->count() > 0);
    }

    public function testGetMenuPage()
    {
        $page = $this->qrmenuPageService->getMenuPage(1);

        $this->assertTrue(strlen($page->name) > 0);
    }

    public function testAddMenuPage()
    {
        $page = $this->qrmenuPageService->addMenuPage([
            'name'      => 'service page',
            'qrmenu_id' => 1
        ]);

        $this->assertTrue($page->name === 'service page');
    }

    public function testUpdateMenuPage()
    {
        $updated = $this->qrmenuPageService->updateMenuPage(1, [
            'name'      => 'updated page',
            'qrmenu_id' => 1
        ]);

        $this->assertTrue($updated);
    }

    public function testDeleteMenuPage()
    {
        $deleted = $this->qrmenuPageService->deleteMenuPage(1);

        $this->assertTrue($deleted);
    }


}
