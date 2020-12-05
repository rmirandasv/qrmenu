<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Qrmenu extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'          => $this->name,
            'qrcode'        => $this->qrcode,
            'cover'         => $this->cover,
            'manager'       => $this->manager,
            'created_at'    => $this->created_at->diffForHumans(),
            'creation_date' => $this->created_at,
            'updated_at'    => $this->updated_at->diffForHumans(),
            'update_date'   => $this->updated_at
        ];
    }
}
