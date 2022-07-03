<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreObserverRequest extends FormRequest
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
            'name' => ['bail', 'required'],
            'email' => ['bail', 'required', 'unique:users'],
            'phone_number' => ['bail', 'required', 'unique:users'],
            'national_identification_number' => ['bail', 'required', "numeric", 'unique:users', "min:8", 'max:8'],
        ];
    }
}
