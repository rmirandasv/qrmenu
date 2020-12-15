<?php

namespace App\Services;

use App\Repositories\QrmenuRepository;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

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

    public function uploadCover (Request $request)
    {
        $cover = null;

        if ($request->hasFile('cover')) {
            $cover = $request->cover;
        }

        if ($cover === null) {
            return false;
        }

        $coverName = Str::random(40);

        $request->cover->storeAs('covers', $coverName);

        return asset('covers/'.$coverName);
    }

}