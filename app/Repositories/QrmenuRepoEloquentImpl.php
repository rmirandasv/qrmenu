<?php

namespace App\Repositories;

use App\Models\Qrmenu;

class QrmenuRepoEloquentImpl extends EloquentRepository implements QrmenuRepository
{
    protected function getModelInstance() : \Illuminate\Database\Eloquent\Model
    {
        return new Qrmenu();
    }

    public function getUserMenu(int $userId)
    {
        return $this->getModelInstance()
            ->where('manager_id', $userId)->first();
    }

    public function getMenu(int $id)
    {
        return $this->get($id);
    }

    public function addMenu(array $data)
    {
        return $this->add($data);
    }

    public function updateMenu(int $id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteMenu(int $id)
    {
        return $this->delete($id);
    }

}