<?php

namespace App\Repositories;

use App\Models\QrmenuPage;

class QrmenuPageRepoEloquentImpl extends EloquentRepository implements QrmenuPageRepository
{

    protected function getModelInstance() : \Illuminate\Database\Eloquent\Model
    {
        return new QrmenuPage();
    }

    public function getMenuPages(int $menuId)
    {
        return $this->getModelInstance()
            ->where('qrmenu_id', $menuId)->get();
    }

    public function getMenuPage(int $id)
    {
        return $this->get($id);
    }

    public function addMenuPage(array $data)
    {
        return $this->add($data);
    }

    public function updateMenuPage(int $id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteMenuPage(int $id)
    {
        return $this->delete($id);
    }

}