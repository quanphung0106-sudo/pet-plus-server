<?php

namespace App\Http\Requests\Enterprise;

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
            'enterprise_name' => 'max:255|string',
            'enterprise_email' => 'unique:enterprises,enterprise_email,' . $this->id . ',id|max:255|email',
            'phone' => 'unique:enterprises,phone|regex:/^0[0-9]{9}$/',
            'address' => 'max:255',
            'max_account_created' => 'numeric',
            'is_active' => 'boolean',
        ];
    }
}
