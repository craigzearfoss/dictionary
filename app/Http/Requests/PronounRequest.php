<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class PronounRequest extends BaseFormRequest
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
            'language_id' => 'requires:int',
            'name'        => 'required:max:20',
            'formality'   => 'max:1',
            'person'      => 'int',
            'plurality'   => 'max:1',
            'gender'      => 'max:1'
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
            'name.required' => 'Name is required.',
            'name.max'      => 'Name must be no longer than 20 characters.',
            'formality:in'  => 'Formality must a single character.',
            'person:in'     => 'Person must be and integer.',
            'plurality:in'  => 'Plurality must a single character.',
            'gender:in'     => 'Gender must a single character.'
        ];
    }
}
