<?php

namespace App\Http\Requests\Exercise;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'content' => 'string',
            'source_id' => 'exists:sources,id',
            'level_id' => 'exists:levels,id',
            'subject_id' => 'exists:subjects,id',
            'exercise_part_id' => 'exists:exercise_parts,id',
            'exercise_format_id' => 'exists:exercise_formats,id',
            'difficulty_level_id' => 'exists:difficulty_levels,id',
            'exercise_type_id' => 'exists:exercise_types,id',
            'exercise_unit' => 'array',
            'exercise_unit.*' => 'exists:exercise_units,id',
            'status_id' => 'exists:statuses,id',
            'video_id' => 'exists:videos,id',
            'audio_id' => 'exists:audio,id',
            'public_type_id' => 'exists:public_types,id',
            'video' => $this->checkFile('video'),
            'audio' => $this->checkFile('audio'),
            'video_name' => 'required_with:video|string|max:255',
            'audio_name' => 'required_with:audio|string|max:255',
        ];
    }

    public function checkFile($key): string
    {
        if (request()->hasFile($key)) {
            if ($key == 'video') {
                return "mimes:mp4,mov,avi,mpeg|mimetypes:video/mp4,video/x-msvideo,video/mpeg,video/quicktime|max:102400";
            }
            if ($key == 'audio') {
                return "mimes:mpga,mp3,wav,wma,m4a|mimetypes:audio/mpeg,audio/x-ms-wma,audio/x-wav,audio/x-m4a|max:51200";
            }
        }

        return "string|max:255";
    }
}
