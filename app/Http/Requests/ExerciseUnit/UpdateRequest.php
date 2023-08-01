<?php

namespace App\Http\Requests\ExerciseUnit;

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
            'exercise_unit_name' => 'string|max:255',
            'subject_id' => 'exists:subjects,id',
            'public_type_id' => 'exists:public_types,id',
            'is_active' => 'boolean',
        ];
    }
}
