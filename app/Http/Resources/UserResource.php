<?php

namespace App\Http\Resources;

use App\Enums\DBConstant;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'name' => $this->name,
            'birthday' => $this->birthday,
            'gender' => $this->gender == DBConstant::MALE ? __('database.male') : __('database.female'),
            'enterprise' => $this->enterprise->enterprise_name ?? "",
            'is_active' => $this->is_active ? __('database.active') : __('database.block')
        ];
    }
}
