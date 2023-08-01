<?php

namespace App\Http\Requests\Enterprise;

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
            'enterprise_name' => 'required|max:255|string',
            'enterprise_email' => 'required|unique:enterprises,enterprise_email|max:255|email',
            'phone' => 'required|unique:enterprises,phone|regex:/^0[0-9]{9}$/',
            'address' => 'required|max:255',
        ];
    }
}
