<?php

namespace App\Services;

use App\Repositories\QrmenuPageItemRepository;

class QrmenuPageItemServiceImpl implements QrmenuPageItemService
{

    private $qrmenuPageItemRepository;

    public function __construct(QrmenuPageItemRepository $qrmenuPageItemRepo)
    {
        $this->qrmenuPageItemRepository = $qrmenuPageItemRepo;
    }

    public function getPageItems(int $pageId)
    {
        return $this->qrmenuPageItemRepository->getPageItems($pageId);
    }

    public function getPageItem(int $id)
    {
        return $this->qrmenuPageItemRepository->getPageItem($id);
    }

    public function addPageItem(array $data)
    {
        return $this->qrmenuPageItemRepository->addPageItem($data);
    }

    public function updatePageItem(int $id, array $data)
    {
        return $this->qrmenuPageItemRepository->updatePageItem($id, $data);
    }

    public function deletePageItem(int $id)
    {
        return $this->qrmenuPageItemRepository->deletePageItem($id);
    }

}