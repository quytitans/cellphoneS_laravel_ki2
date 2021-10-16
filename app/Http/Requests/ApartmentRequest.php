<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
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
            'name' => 'required|min:10|max:50',
            'address' => 'required',
            'price' => 'numeric',
            'information' => 'required',
            'informationDetail' => 'required',
            'thumbnail' => 'url',
            'status' => 'required|min:1|max:3',
        ];
    }
}
