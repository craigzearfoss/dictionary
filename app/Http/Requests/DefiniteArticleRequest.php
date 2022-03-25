<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class DefiniteArticleRequest extends BaseFormRequest
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
            'language_id' => 'int',
            'name'    => [
                'required',
                'max:20',
                Rule::unique('tenses')->ignore($this->tense)
            ],
            'gender_id'   => 'int'
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
            'language_id.int' => 'language_id must be an integer.',
            'name.required'   => 'Definite Article name is required.',
            'name.max'        => 'Definite Article name must be no longer than 10 characters.',
            'gender_id.int'   => 'gender_id must be an integer.'
        ];
    }
}
