<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QrmenuPageItemRepository;
use App\Models\User;
use App\Models\Qrmenu;
use App\Models\QrmenuPage;
use App\Models\QrmenuPageItem;

class QrmenuPageItemRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $qrmenuPageItemRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->qrmenuPageItemRepository = $this->app->make(QrmenuPageItemRepository::class);

        User::factory()->count(1)->create();
        Qrmenu::factory()->count(1)->create();
        QrmenuPage::factory()->count(1)->create();
        QrmenuPageItem::factory()->count(10)->create();
    }

    public function testGetPageItems()
    {
        $items = $this->qrmenuPageItemRepository->getPageItems(1);

        $this->assertTrue($items->count() > 0);
    }

    public function testGetPageItem()
    {
        $item = $this->qrmenuPageItemRepository->getPageItem(1);

        $this->assertTrue(strlen($item->item_name) > 0);
    }

    public function testAddPageItem()
    {
        $item = $this->qrmenuPageItemRepository->addPageItem([
            'qrmenu_page_id'    => 1,
            'item_name'         => $this->faker->name,
            'item_desc'         => $this->faker->text
        ]);

        $this->assertTrue(strlen($item->item_name) > 0);
    }

    public function testUpdatePageItem()
    {
        $updated = $this->qrmenuPageItemRepository->updatePageItem(1, [
            'qrmenu_page_id'    => 1,
            'item_name'         => 'updated name from tests',
            'item_desc'         => 'updated desc from tests'
        ]);

        $this->assertTrue($updated);
    }

    public function testDeletePageItem()
    {
        $deleted = $this->qrmenuPageItemRepository->deletePageItem(1);

        $this->assertTrue($deleted);
    }

}
