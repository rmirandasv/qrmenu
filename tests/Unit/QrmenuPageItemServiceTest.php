<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\QrmenuPageItemService;
use App\Models\User;
use App\Models\Qrmenu;
use App\Models\QrmenuPage;
use App\Models\QrmenuPageItem;

class QrmenuPageItemServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $qrmenuPageItemService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->qrmenuPageItemService = $this->app->make(QrmenuPageItemService::class);

        User::factory()->count(1)->create();
        Qrmenu::factory()->count(1)->create();
        QrmenuPage::factory()->count(1)->create();
        QrmenuPageItem::factory()->count(1)->create();
    }

    public function testGetPageItems()
    {
        $items = $this->qrmenuPageItemService->getPageItems(1);

        $this->assertTrue($items->count() > 0);
    }

    public function testGetPageItem()
    {
        $item = $this->qrmenuPageItemService->getPageItem(1);

        $this->assertTrue(strlen($item->item_name) > 0);
    }

    public function testAddPageItem()
    {
        $item = $this->qrmenuPageItemService->addPageItem([
            'qrmenu_page_id'    => 1,
            'item_name'         => 'some item name',
            'item_desc'         => 'some desc'
        ]);

        $this->assertTrue($item->item_name === 'some item name');
    }

    public function testUpdatePageItem()
    {
        $updated = $this->qrmenuPageItemService->updatePageItem(1, [
            'qrmenu_page_id'    => 1,
            'item_name'         => 'updated name',
            'item_desc'         => 'some desc'
        ]);

        $this->assertTrue($updated);
    }

    public function testDeletePageItem()
    {
        $deleted = $this->qrmenuPageItemService->deletePageItem(1);

        $this->assertTrue($deleted);
    }
    
}
