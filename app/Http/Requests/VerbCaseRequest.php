<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class VerbCaseRequest extends BaseFormRequest
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
                'max:10',
                Rule::unique('cases')->ignore($this->case)
            ],
            'role'        => 'required|max:50',
            'description' => 'max:50'
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
            'name.unique'     => 'Case name already exists.',
            'name.required'   => 'Case name is required.',
            'name.max'        => 'Case name must be no longer than 10 characters.',
            'role.required'   => 'Case role is required.',
            'role.max'        => 'Case role must be no longer than 50 characters.',
            'description.max' => 'Case description must be no longer than 50 characters.'
        ];
    }
}
