<?php

namespace App\Repositories;

interface UserRepository
{
    public function getAllUsers(array $data = []);

    public function getUser(int $id);

    public function addUser(array $data = []);

    public function updateUser(int $id, array $data = []);

    public function deleteUser(int $id);
}