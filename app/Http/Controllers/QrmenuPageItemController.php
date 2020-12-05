<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QrmenuPageItemService;
use App\Http\Requests\StoreQrmenuPageItem;
use App\Http\Requests\UpdateQrmenuPageItem;
use App\Http\Resources\QrmenuPageItem;
use App\Http\Resources\QrmenuPageItemCollection;

class QrmenuPageItemController extends Controller
{

    private $qrmenuPageItemService;

    public function __construct(QrmenuPageItemService $qrmenuPageItemService)
    {
        $this->qrmenuPageItemService = $qrmenuPageItemService;
    }

    public function getPageItems($pageId)
    {
        $items = $this->qrmenuPageItemService->getPageItems($pageId);

        return new QrmenuPageItemCollection($items);
    }

    public function getPageItem($id)
    {
        $item = $this->qrmenuPageItemService->getPageItem($id);

        return new QrmenuPageItem($item);
    }

    public function addPageItem(StoreQrmenuPageItem $request)
    {
        $item = $this->qrmenuPageItemService->addPageItem($request->validated());

        return (new QrmenuPageItem($item))->additional([
            'message'   => __('messages.qrmenupageitem.created')
        ]);
    }

    public function updatePageItem($id, UpdateQrmenuPageItem $request)
    {
        $this->qrmenuPageItemService->updatePageItem($id, $request->validated());

        return response([
            'message'   => __('messages.qrmenupageitem.updated')
        ], 200);
    }

    public function deletePageItem($id)
    {
        $this->qrmenuPageItemService->deletePageItem($id);

        return response([
            'message'   => __('messages.qrmenupageitem.deleted')
        ], 200);
    }



}
