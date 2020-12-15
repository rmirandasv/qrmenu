<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Events\UserRegistered;

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
        $user = $this->userReposutory->addUser($data);

       //event(new UserRegistered($user));

        return $user;
    }

    public function updateUser(int $id, array $data = [])
    {
        return $this->userReposutory->updateUser($id, $data);
    }

    public function deleteUser(int $id)
    {
        return $this->userReposutory->deleteUser($id);
    }

    public function verifyUserEmail(int $id)
    {
        $user = $this->getUser($id);

        $user->email_verified_at = new \DateTime();

        return $user->save();
    }

}