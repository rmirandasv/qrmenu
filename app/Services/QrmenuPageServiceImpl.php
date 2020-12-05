<?php

namespace App\Services;

use App\Repositories\QrmenuPageRepository;

class QrmenuPageServiceImpl implements QrmenuPageService
{

    private $qrmenuPageRepository;

    public function __construct(QrmenuPageRepository $qrpageRepo)
    {
        $this->qrmenuPageRepository = $qrpageRepo;
    }

    public function getMenuPages(int $menuId)
    {
        return $this->qrmenuPageRepository->getMenuPages($menuId);
    }

    public function getMenuPage(int $id)
    {
        return $this->qrmenuPageRepository->getMenuPage($id);
    }

    public function addMenuPage(array $data)
    {
        return $this->qrmenuPageRepository->addMenuPage($data);
    }

    public function updateMenuPage(int $id, array $data)
    {
        return $this->qrmenuPageRepository->updateMenuPage($id, $data);
    }

    public function deleteMenuPage(int $id)
    {
        return $this->qrmenuPageRepository->deleteMenuPage($id);
    }

}