<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->name,
            'last_name'     => $this->last_name,
            'email'         => $this->email,
            'company_name'  => $this->company_name,
            'company_logo'  => $this->company_logo,
            'created_at'    => $this->created_at->diffForHumans(),
            'creation_date' => $this->created_at,
            'updated_at'    => $this->updated_at->diffForHumans(),
            'update_date'   => $this->updated_at
        ];
    }
}
