<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends BaseFormRequest
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
                Rule::unique('tags')->ignore($this->tag)
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
            'name.unique'   => 'Tag name already exists.',
            'name.required' => 'Tag name is required.',
            'name.max'      => 'Tag name must be no longer than 10 characters.',
            'active:in'     => 'Active must be either 0 or 1.'
        ];
    }
}
