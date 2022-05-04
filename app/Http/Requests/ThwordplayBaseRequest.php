<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class ThwordplayBaseRequest extends BaseFormRequest
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
                'max:20',
                Rule::unique('thwordplay_bases')->ignore($this->thwordplay_base)
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
            'name.unique'    => 'Base ame already exists.',
            'name.required'  => 'Base name is required.',
            'name.max'       => 'Base name must be no longer than 20 characters.'
        ];
    }
}
