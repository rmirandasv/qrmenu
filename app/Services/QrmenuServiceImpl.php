<?php

namespace App\Services;

use App\Repositories\QrmenuRepository;

class QrmenuServiceImpl implements QrmenuService
{

    private $qrmenuRepository;

    public function __construct(QrmenuRepository $qrmenuRepository)
    {
        $this->qrmenuRepository = $qrmenuRepository;
    }

    public function getUserMenu(int $userId)
    {
        return $this->qrmenuRepository->getUserMenu($userId);
    }

    public function getMenu(int $id)
    {
        return $this->qrmenuRepository->getMenu($id);
    }

    public function addMenu(array $data)
    {
        return $this->qrmenuRepository->addMenu($data);
    }

    public function updateMenu(int $id, array $data)
    {
        return $this->qrmenuRepository->updateMenu($id, $data);
    }

    public function deleteMenu(int $id)
    {
        return $this->qrmenuRepository->deleteMenu($id);
    }

}