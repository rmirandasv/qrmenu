<?php

namespace App\Repositories;

interface QrmenuRepository
{
    public function getUserMenu(int $userId);

    public function getMenu(int $id);

    public function addMenu(array $data);

    public function updateMenu(int $id, array $data);

    public function deleteMenu(int $id);

}