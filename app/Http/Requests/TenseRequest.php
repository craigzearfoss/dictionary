<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class TenseRequest extends BaseFormRequest
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
                'max:250',
                Rule::unique('tenses')->ignore($this->tense)
            ],
            'abbrev' => [
                'required',
                'max:10',
                Rule::unique('tenses')->ignore($this->tense)
            ],
            'structure'   => 'max:100',
            'sample'      => 'max:50',
            'example1'    => 'max:100',
            'example2'    => 'max:100',
            //'tense'
            'simple'      => 'in:0,1',
            'continuous'  => 'in:0,1',
            'perfect'     => 'in:0,1',
            'imperfect'   => 'in:0,1',
            'indicative'  => 'in:0,1',
            'imperative'  => 'in:0,1',
            'progressive' => 'in:0,1'
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
            'name.unique'     => 'Tense name already exists.',
            'name.required'   => 'Tense name is required.',
            'name.max'        => 'Tense name must be no longer than 250 characters.',
            'abbrev.unique'   => 'Tense abbreviation already exists.',
            'abbrev.required' => 'Tense abbreviation is required.',
            'abbrev.max'      => 'Tense abbreviation must be no longer than 10 characters.',
            'structure.max'   => 'Tense structure must be no longer than 10 characters.',
            'sample.max'      => 'Tense sample must be no longer than 10 characters.',
            'example1.max'    => 'Tense example1 must be no longer than 100 characters.',
            'example2.max'    => 'Tense example2 must be no longer than 100 characters.',
            //'tense'
            'simple:in'       => 'Simple must be either 0 or 1.',
            'continuous:in'   => 'Continuous must be either 0 or 1.',
            'perfect:in'      => 'Perfect must be either 0 or 1.',
            'imperfect'       => 'Imperfect must be either 0 or 1.',
            'indicative:in'   => 'Indicative must be either 0 or 1.',
            'imperative:in'   => 'Imperative must be either 0 or 1.',
            'progressive:in'  => 'Progressive must be either 0 or 1.'
        ];
    }
}
