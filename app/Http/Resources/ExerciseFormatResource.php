<?php

namespace App\Http\Resources;

use App\Enums\DBConstant;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseFormatResource extends JsonResource
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
            'exercise_format_name' => $this->exercise_format_name,
            'subject' => $this->subject->is_active ? $this->subject->subject_name : "",
            'public_type' => $this->public_type->public_type_name,
            'is_active' => $this->is_active ? __('database.active') : __('database.block')
        ];
    }
}
