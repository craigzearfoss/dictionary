<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class TermRequest extends BaseFormRequest
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
            'term'       => 'required|max:255',
            'definition' => 'max:255',
            'sentence'   => 'max:255',
            'en_us'      => 'max:255',
            'en_uk'      => 'max:255',
            'ar'         => 'max:255',
            'cs'         => 'max:255',
            'da'         => 'max:255',
            'de'         => 'max:255',
            'el'         => 'max:255',
            'es_es'      => 'max:255',
            'es_la'      => 'max:255',
            'fi'         => 'max:255',
            'fr'         => 'max:255',
            'hr'         => 'max:255',
            'it'         => 'max:255',
            'ja'         => 'max:255',
            'ko'         => 'max:255',
            'nl'         => 'max:255',
            'no'         => 'max:255',
            'pl'         => 'max:255',
            'pt_br'      => 'max:255',
            'pt_pt'      => 'max:255',
            'ro'         => 'max:255',
            'ru'         => 'max:255',
            'sv'         => 'max:255',
            'th'         => 'max:255',
            'tr'         => 'max:255',
            'uk'         => 'max:255',
            'vi'         => 'max:255',
            'zh'         => 'max:255'
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
            'abbrev.unique'           => 'Abbreviation is must be unique.',
            'abbrev.required'         => 'Abbreviation is required.',
            'abbrev.min'              => 'Abbreviation must be at least 2 characters.',
            'abbrev.max'              => 'Abbreviation must be longer than 10 characters',
            'short.required'          => 'Short Name is required.',
            'short.max'               => 'Short Name must be longer than 50 characters',
            'full.required'           => 'Full Name is required.',
            'full.max'                => 'Full Name must be longer than 100 characters',
            'code.required'           => 'Code is required.',
            'code.min'                => 'Code must be at least 2 characters.',
            'code.max'                => 'Code must be longer than 10 characters',
            'name.required'           => 'English Language Name is required.',
            'name.max'                => 'Name must be longer than 100 characters',
            'directionality.required' => 'Directionality is required.',
            'directionality.in'       => 'Directionality must be either "ltr" or "rtl".',
            'local.required'          => 'Local Language Name is required.',
            'local.max'               => 'Local must be longer than 100 characters',
            'wiki.required'           => 'Wikipedia Article must be longer than 100 characters',
        ];
    }
}
