<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
            'person_name' => ['required'],
            'person_national_identification_number' => ['nullable', 'numeric', "min:8", "max:8"],
            'person_birth_certificate_number' => ['nullable'],
            'person_passport_number' => ['nullable'],
            'person_phone_number' => ['bail', 'nullable'],
            'person_date_of_birth' => ['bail', 'required' ,'date'],
            'keys' => ['nullable', 'array'],
            'values' => ['nullable', 'array'],
            'last_seen' => ['bail','required', 'date'],
            'last_seen_place' => ['bail', 'required', 'required'],
            'last_seen_with' => ['array', 'nullable'],
            'observers' => ['bail', 'required', 'array'],
            'observers.*' => ['integer'],
        ];
    }
}
