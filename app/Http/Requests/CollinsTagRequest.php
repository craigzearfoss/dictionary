<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CollinsTagRequest extends BaseFormRequest
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
                'max:80',
                Rule::unique('collins_tags')->ignore($this->collins_tag)
            ],
            'active'  => 'in:0,1'
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
            'name.unique'   => 'Collins Tag name already exists.',
            'name.required' => 'Collins Tag name is required.',
            'name.max'      => 'Collins Tag name must be no longer than 80 characters.',
            'active:in'     => 'Active must be either 0 or 1.'
        ];
    }
}
