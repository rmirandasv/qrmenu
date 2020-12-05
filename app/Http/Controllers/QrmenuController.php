<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreQrmenu;
use App\Http\Requests\UpdateQrmenu;
use App\Http\Resources\Qrmenu;
use App\Http\Resources\QrmenuCollection;
use App\Services\QrmenuService;

class QrmenuController extends Controller
{

    private $qrmenuService;

    public function __construct(QrmenuService $qrmenuService)
    {
        $this->qrmenuService = $qrmenuService;
    }

    public function getUserMenu($userId)
    {
        $menu = $this->qrmenuService->getUserMenu($userId);

        return new Qrmenu($menu);
    }

    public function getMenu($id)
    {
        $menu = $this->qrmenuService->getMenu($id);

        return new Qrmenu($menu);
    }

    public function addMenu(StoreQrmenu $request)
    {
        $menu = $this->qrmenuService->addMenu($request->validated());

        return (new Qrmenu($menu))
            ->additional([
                'message'   => __('messages.qrmenus.created')
            ]);
    }

    public function updateMenu($id, UpdateQrmenu $request)
    {
        $this->qrmenuService->updateMenu($id, $request->validated());

        return response([
            'message'   => __('messages.qrmenus.updated')
        ], 200);
    }

    public function deleteMenu($id)
    {
        $this->qrmenuService->deleteMenu($id);

        return response([
            'message'   => __('messages.qrmenus.deleted')
        ], 200);
    }

    
}
