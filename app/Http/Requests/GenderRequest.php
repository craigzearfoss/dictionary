<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class GenderRequest extends BaseFormRequest
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
            'name' => [
                'required',
                'max:20',
                Rule::unique('genders')->ignore($this->gender)
            ],
            'abbrev' => [
                'required',
                'max:1',
                Rule::unique('genders')->ignore($this->gender)
            ],
            'description' => 'max:255'
       ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique'     => 'Gender name already exists.',
            'name.required'   => 'Gender name is required.',
            'name.max'        => 'Gender name must be no longer than 20 characters.',
            'abbrev.unique'   => 'Gender abbrev already exists.',
            'abbrev.required' => 'Gender abbrev role is required.',
            'abbrev.max'      => 'Gender abbrev must be no longer than 10 characters.',
            'description.max' => 'Gender description must be no longer than 255 characters.'
        ];
    }
}
