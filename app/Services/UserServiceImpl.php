<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserServiceImpl implements UserService
{
    private $userReposutory;

    public function __construct(UserRepository $userRepository)
    {
        $this->userReposutory = $userRepository;
    }

    public function getAllUsers(array $data = [])
    {
        return $this->userReposutory->getAllUsers();
    }

    public function getUser(int $id)
    {
        return $this->userReposutory->getUser($id);
    }

    public function addUser(array $data = [])
    {
        return $this->userReposutory->addUser($data);
    }

    public function updateUser(int $id, array $data = [])
    {
        return $this->userReposutory->updateUser($id, $data);
    }

    public function deleteUser(int $id)
    {
        return $this->userReposutory->deleteUser($id);
    }

}