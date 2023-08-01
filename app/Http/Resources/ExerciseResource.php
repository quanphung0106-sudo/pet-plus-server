<?php

namespace App\Http\Resources;

use App\Enums\DBConstant;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseResource extends JsonResource
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
            'content' => $this->content,
            'source' => $this->source->source_name ?? "",
            'level' => $this->level->is_active ? $this->level->level_name : "",
            'subject' => $this->subject->is_active ? $this->subject->subject_name : "",
            'exercise_part' => $this->exercise_part->is_active ? $this->exercise_part->exercise_part_name : "",
            'exercise_format' => $this->exercise_format->is_active ? $this->exercise_format->exercise_format_name : "",
            'exercise_unit' => ExerciseUnitResource::collection($this->exercise_units)->where('is_active', DBConstant::STATUS_ACTIVE),
            'difficulty_level' => $this->difficulty_level->is_active ? $this->difficulty_level->difficulty_level_name : "",
            'exercise_type' => $this->exercise_type->is_active ? $this->exercise_type->exercise_type_name : "",
            'status' => $this->status->status_name,
            'public_type' => $this->public_type->public_type_name,
            'video' => $this->video->url ?? "",
            'audio' => $this->audio->url ?? "",
        ];
    }
}
