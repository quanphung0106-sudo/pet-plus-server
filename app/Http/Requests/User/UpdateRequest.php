<?php

namespace App\Http\Requests\User;

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
            'email' => 'email|max:255|unique:users,email,' . $this->id . ',id',
            'name' => 'max:50',
            'birthday' => 'date|before:today',
            'phone' => 'regex:/^0[0-9]{9}$/',
            'address' => 'max:255',
            'gender' => 'in:0,1',
            'enterprise_id' => 'nullable|exists:enterprises,id',
            'is_active' => 'boolean',
        ];
    }
}
