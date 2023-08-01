<?php

namespace App\Http\Resources;

use App\Enums\DBConstant;
use Illuminate\Http\Resources\Json\JsonResource;

class EnterpriseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'enterprise_name' => $this->enterprise_name,
            'is_active' => $this->is_active ? __('database.active') : __('database.block')
        ];
    }
}
