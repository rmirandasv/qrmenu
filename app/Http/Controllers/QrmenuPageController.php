<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QrmenuPageService;
use App\Http\Requests\StoreQrmenuPage;
use App\Http\Requests\UpdateQrmenuPage;
use App\Http\Resources\QrmenuPage;
use App\Http\Resources\QrmenuPageCollection;

class QrmenuPageController extends Controller
{

    private $qrmenuPageService;

    public function __construct(QrmenuPageService $qrmenuPageService)
    {
        $this->qrmenuPageService = $qrmenuPageService;
    }

    public function getMenuPages($menuId)
    {
        $pages = $this->qrmenuPageService->getMenuPages($menuId);

        return new QrmenuPageCollection($pages);
    }

    public function getMenuPage($menuId, $pageId)
    {
        $page = $this->qrmenuPageService->getMenuPage($pageId);

        return new QrmenuPage($page);
    }

    public function addMenuPage(StoreQrMenuPage $request)
    {
        $page = $this->qrmenuPageService->addMenuPage($request->validated());

        return (new QrmenuPage($page))->additional([
            'message'   => __('messages.qrmenupages.created')
        ]);
    }

    public function updateMenuPage($id, UpdateQrmenuPage $request)
    {
        $this->qrmenuPageService->updateMenuPage($id, $request->validated());

        return response([
            'message'   => __('messages.qrmenupages.updated')
        ], 200);
    }

    public function deleteMenuPage($id)
    {
        $this->qrmenuPageService->deleteMenuPage($id);

        return response([
            'message'   => __('messages.qrmenupages.deleted')
        ], 200);
    }

}
