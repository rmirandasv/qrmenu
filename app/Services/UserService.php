<?php

namespace App\Services;

interface UserService
{
    public function getAllUsers(array $data = []);

    public function getUser(int $id);

    public function addUser(array $data = []);

    public function updateUser(int $id, array $data = []);

    public function deleteUser(int $id);

    public function verifyUserEmail(int $id);
}