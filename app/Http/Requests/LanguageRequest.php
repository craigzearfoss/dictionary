<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LanguageRequest extends BaseFormRequest
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
            'abbrev'    => [
                'required',
                'min:2',
                'max:10',
                Rule::unique('languages')->ignore($this->language)
            ],
            'active'         => 'in:0,1',
            'short'          => 'required|max:50',
            'full'           => 'required|max:100',
            'code'           => 'required|min:2|max:10',
            'article_group'  => 'min:2|max:2',
            'name'           => 'required|max:50',
            'directionality' => 'required|in:ltr,rtl',
            'local'          => 'required|max:100',
            'wiki'           => 'required|max:50'
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
            'abbrev.unique'           => 'Abbreviation already exists.',
            'abbrev.required'         => 'Abbreviation is required.',
            'abbrev.min'              => 'Abbreviation must be at least 2 characters.',
            'abbrev.max'              => 'Abbreviation must be no longer than 10 characters.',
            'active:in'               => 'Active must be either 0 or 1.',
            'short.required'          => 'Short Name is required.',
            'short.max'               => 'Short Name must be no longer than 50 characters.',
            'full.required'           => 'Full Name is required.',
            'full.max'                => 'Full Name must be no longer than 100 characters.',
            'code.required'           => 'Code is required.',
            'code.min'                => 'Code must be at least 2 characters.',
            'code.max'                => 'Code must be no longer than 10 characters.',
            'article_group.min'       => 'Article Group must be 2 characters.',
            'article_group.max'       => 'Article Group must be 2 characters.',
            'name.required'           => 'English Language Name is required.',
            'name.max'                => 'Name must be no longer than 100 characters.',
            'directionality.required' => 'Directionality is required.',
            'directionality.in'       => 'Directionality must be either "ltr" or "rtl".',
            'local.required'          => 'Local Language Name is required.',
            'local.max'               => 'Local must be no longer than 100 characters.',
            'wiki.required'           => 'Wikipedia Article must be longer than 100 characters.',
        ];
    }
}
