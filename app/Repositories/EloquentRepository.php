<?php

namespace App\Repositories;

use Illuminate\Support\Arr;

abstract class EloquentRepository
{
    protected abstract function getModelInstance() : \Illuminate\Database\Eloquent\Model;

    protected $perpage = 15;

    protected function all(array $data = array())
    {
        $perpage = Arr::get($data, 'perpage', $this->perpage);
        return $this->getModelInstance()->paginate($perpage);
    }

    public function get(int $id)
    {
        return $this->getModelInstance()->findOrFail($id);
    }

    public function add(array $data = array())
    {
        return $this->getModelInstance()->create($data);
    }

    public function update(int $id, array $data = array())
    {
        $model = $this->get($id);

        return $model->update($data);
    }

    public function delete(int $id)
    {
        $model = $this->get($id);

        return $model->delete();
    }
}