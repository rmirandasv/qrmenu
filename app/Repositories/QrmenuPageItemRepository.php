<?php

namespace App\Repositories;

interface QrmenuPageItemRepository
{
    public function getPageItems(int $pageId);

    public function getPageItem(int $id);

    public function addPageItem(array $data);

    public function updatePageItem(int $id, array $data);

    public function deletePageItem(int $id);
}