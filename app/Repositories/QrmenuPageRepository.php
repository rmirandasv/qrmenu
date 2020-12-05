<?php

namespace App\Repositories;

interface QrmenuPageRepository
{

    public function getMenuPages(int $menuId);

    public function addMenuPage(array $data);

    public function getMenuPage(int $id);

    public function updateMenuPage(int $id, array $data);

    public function deleteMenuPage(int $id);

}