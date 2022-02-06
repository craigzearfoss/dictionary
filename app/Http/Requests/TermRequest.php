<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'term'          => [
                'required',
                'max:100',
                Rule::unique('terms')
                    ->where('definition', $this->definition)
            ],
            'enabled'       => 'in:0,1',
            'definition'    => 'max:255',
            'pos_text'      => 'max:50',
            'category_text' => 'max:50',
            'sentence'      => 'max:255',
            'en_us'         => 'max:100',
            'pron_en_us'    => 'max:100',
            'en_uk'         => 'max:100',
            'pron_en_uk'    => 'max:100',
            'ar'            => 'max:100',
            'cs'            => 'max:100',
            'da'            => 'max:100',
            'de'            => 'max:100',
            'el'            => 'max:100',
            'es_es'         => 'max:100',
            'es_la'         => 'max:100',
            'fi'            => 'max:100',
            'fr'            => 'max:100',
            'hr'            => 'max:100',
            'it'            => 'max:100',
            'ja'            => 'max:100',
            'ko'            => 'max:100',
            'nl'            => 'max:100',
            'no'            => 'max:100',
            'pl'            => 'max:100',
            'pt_br'         => 'max:100',
            'pt_pt'         => 'max:100',
            'ro'            => 'max:100',
            'ru'            => 'max:100',
            'sv'            => 'max:100',
            'th'            => 'max:100',
            'tr'            => 'max:100',
            'uk'            => 'max:100',
            'vi'            => 'max:100',
            'zh'            => 'max:100'
        ];

        return [
            'name'    => 'required|max:50|unique:tags,name'
                . (!empty($this->tags->id) ? ",{$this->tags->id}" : ''),
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
            'term.required'     => 'Term is required.',
            'term.max'          => 'Term be longer than 100 characters.',
            'enabled:in'        => 'Enabled must be either 0 or 1.',
            'definition.max'    => 'Definition must be longer than 255 characters.',
            'pos_text.required' => 'Part of Speech must be longer than 50 characters.',
            'category_text.max' => 'Category must be longer than 50 characters.',
            'sentence.max'      => 'Sentence must be longer than 255 characters.',
            'en_us.max'         => 'American English must be longer than 100 characters.',
            'pron_en_us.max'    => 'American English pronunciation must be longer than 100 characters.',
            'en_uk.max'         => 'British English English must be longer than 100 characters.',
            'pron_en_uk.max'    => 'British English pronunciation must be longer than 100 characters.',
            'ar.max'            => 'Arabic must be longer than 100 characters.',
            'cs.max'            => 'Czech must be longer than 100 characters.',
            'da.max'            => 'Danish must be longer than 100 characters.',
            'de.max'            => 'German must be longer than 100 characters.',
            'el.max'            => 'Greek must be longer than 100 characters.',
            'es_es.max'         => 'European Spanish must be longer than 100 characters.',
            'es_la.max'         => 'Latin American Spanish must be longer than 100 characters.',
            'fi.max'            => 'Finnish must be longer than 100 characters.',
            'fr.max'            => 'French must be longer than 100 characters.',
            'hr.max'            => 'Croatian must be longer than 100 characters.',
            'it.max'            => 'Italian must be longer than 100 characters.',
            'ja.max'            => 'Japanese must be longer than 100 characters.',
            'ko.max'            => 'Korean must be longer than 100 characters.',
            'nl.max'            => 'Dutch must be longer than 100 characters.',
            'no.max'            => 'Norwegian must be longer than 100 characters.',
            'pl.max'            => 'Polish must be longer than 100 characters.',
            'pt_br.max'         => 'Brazilian Portuguese must be longer than 100 characters.',
            'pt_pt.max'         => 'European Portuguese must be longer than 100 characters.',
            'ro.max'            => 'Romanian must be longer than 100 characters.',
            'ru.max'            => 'Russian must be longer than 100 characters.',
            'sv.max'            => 'SwedishArabic must be longer than 100 characters.',
            'th.max'            => 'Thai must be longer than 100 characters.',
            'tr.max'            => 'Turkish must be longer than 100 characters.',
            'uk.max'            => 'Ukrainian must be longer than 100 characters.',
            'vi.max'            => 'Vietnamese must be longer than 100 characters.',
            'zh.max'            => 'Chinese must be longer than 100 characters.'
        ];
    }
}
