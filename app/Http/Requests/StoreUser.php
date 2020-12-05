<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUser extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => ['required', 'max:100'],
            'last_name'     => ['required', 'max:100'],
            'email'         => ['required', 'max:255', 'email', Rule::unique('users')->ignore($this->id)],
            'company_name'  => ['required', 'max:100'],
            'company_logo'  => ['max:255'],
            'password'      => ['required']
        ];
    }
}
