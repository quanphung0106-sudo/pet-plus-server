<?php

namespace App\Http\Requests\ExercisePart;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'exercise_part_name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'public_type_id' => 'required|exists:public_types,id',
        ];
    }
}
