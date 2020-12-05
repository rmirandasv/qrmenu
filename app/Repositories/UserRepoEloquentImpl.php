<?php

namespace App\Repositories;

use App\Models\User;

class UserRepoEloquentImpl extends EloquentRepository implements UserRepository
{

    protected function getModelInstance() : \Illuminate\Database\Eloquent\Model
    {
        return new User();
    }

    public function getallUsers(array $data = [])
    {
        return $this->all($data);
    }

    public function getUser(int $id)
    {
        return $this->get($id);
    }

    public function addUser(array $data = [])
    {
        return $this->add($data);
    }

    public function updateUser(int $id, array $data = [])
    {
        return $this->update($id, $data);
    }

    public function deleteUser(int $id)
    {
        return $this->delete($id);
    }

}