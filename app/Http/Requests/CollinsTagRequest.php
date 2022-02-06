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
                'max:50',
                Rule::unique('collins_tags')->ignore($this->collins_tag)
            ],
            'enabled' => 'in:0,1'
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
            'name.unique'   => 'Collins tag name already exists.',
            'name.required' => 'Collins tag name is required.',
            'name.max'      => 'Collins tag name must be longer than 10 characters.',
            'enabled:in'    => 'Enabled must be either 0 or 1.'
        ];
    }
}
