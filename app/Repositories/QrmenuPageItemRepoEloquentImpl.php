<?php

namespace App\Repositories;

use App\Models\QrmenuPageItem;

class QrmenuPageItemRepoEloquentImpl extends EloquentRepository implements QrmenuPageItemRepository
{

    protected function getModelInstance(): \Illuminate\Database\Eloquent\Model
    {
        return new QrmenuPageItem();
    }

    public function getPageItems(int $pageId)
    {
        return $this->getModelInstance()
            ->where('qrmenu_page_id', $pageId)->get();
    }

    public function getPageItem(int $id)
    {
        return $this->get($id);
    }

    public function addPageItem(array $data)
    {
        return $this->add($data);
    }

    public function updatePageItem(int $id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deletePageItem(int $id)
    {
        return $this->delete($id);
    }

}