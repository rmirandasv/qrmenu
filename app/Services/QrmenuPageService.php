<?php

namespace App\Services;

interface QrmenuPageService
{
    public function getMenuPages(int $menuId);

    public function getMenuPage(int $id);

    public function addMenuPage(array $data);

    public function updateMenuPage(int $id, array $data);

    public function deleteMenuPage(int $id);

}