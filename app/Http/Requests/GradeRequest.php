<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends BaseFormRequest
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
            'name'    => [
                'required',
                'max:50',
                Rule::unique('grades')->ignore($this->grade)
            ],
            'level' => [
                'required',
                Rule::unique('grades')->ignore($this->grade)
            ]
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
            'name.unique'    => 'Grade name already exists.',
            'name.required'  => 'Grade name is required.',
            'name.max'       => 'Grade name must be no longer than 10 characters.',
            'level.unique'   => 'Grade level already exists.',
            'level.required' => 'Grade level is required.'
        ];
    }
}
