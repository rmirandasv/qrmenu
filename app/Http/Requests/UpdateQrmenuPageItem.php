<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQrmenuPageItem extends FormRequest
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
            'qrmenu_page_id'    => ['required', 'exists:qrmenu_pages,id'],
            'item_name'         => ['required', 'max:100'],
            'item_desc'         => ['required', 'max:255']
        ];
    }
}
