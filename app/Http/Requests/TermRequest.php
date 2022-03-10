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
        $data = [
            'term' => [
                'required',
                'max:100',
                /*
                Rule::unique('terms')
                    ->where('term', $this->term)
                    ->where('pos_id', $this->pos_id)
                    ->where('collin_def', $this->collins_def)
                    ->ignore($this->id)
                */
            ],
            'active'        => 'in:0,1',
            'definition'    => 'max:255',
            'pos_id'        => 'int',
            'pos_text'      => 'max:50',
            'collins_tag'   => 'max:50',
            'sentence'      => 'max:255',
            'collins_en_us' => 'max:100',
            'pron_en_us'    => 'max:100',
            'collins_en_uk' => 'max:100',
            'pron_en_uk'    => 'max:100',
            'collins_ar'    => 'max:100',
            'collins_cs'    => 'max:100',
            'collins_da'    => 'max:100',
            'collins_de'    => 'max:100',
            'collins_el'    => 'max:100',
            'collins_es_es' => 'max:100',
            'collins_es_la' => 'max:100',
            'collins_fi'    => 'max:100',
            'collins_fr'    => 'max:100',
            'collins_hr'    => 'max:100',
            'collins_it'    => 'max:100',
            'collins_ja'    => 'max:100',
            'collins_ko'    => 'max:100',
            'collins_nl'    => 'max:100',
            'collins_no'    => 'max:100',
            'collins_pl'    => 'max:100',
            'collins_pt_br' => 'max:100',
            'collins_pt_pt' => 'max:100',
            'collins_ro'    => 'max:100',
            'collins_ru'    => 'max:100',
            'collins_sv'    => 'max:100',
            'collins_th'    => 'max:100',
            'collins_tr'    => 'max:100',
            'collins_uk'    => 'max:100',
            'collins_vi'    => 'max:100',
            'collins_zh'    => 'max:100'
        ];

        if ($this->method() === 'PUT') {
            $data['term'] = 'required|max:100';
        } else {
            $data['term'] = [
                'required',
                'max:100',
                Rule::unique('terms')
                    ->where('pos_id', $this->pos_id)
                    ->where('definition', $this->definition)
            ];
        }

        return $data;
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
            'term.unique'       => 'Duplicate definition for this term already exists.',
            'definition.max'    => 'Definition must be no longer than 255 characters.',
            'pos_id.int'        => 'pos_id must be an integer.',
            'pos_text.required' => 'Part of Speech must be no longer than 50 characters.',
            'collins_tag.max'   => 'Collins Tag must be no longer than 50 characters.',
            'sentence.max'      => 'Sentence must be no longer than 255 characters.',
            'collins_en_us.max' => 'American English must be no longer than 100 characters.',
            'pron_en_us.max'    => 'American English pronunciation must be no longer than 100 characters.',
            'collins_en_uk.max' => 'British English English must be no longer than 100 characters.',
            'pron_en_uk.max'    => 'British English pronunciation must be no longer than 100 characters.',
            'collins_ar.max'    => 'Arabic must be no longer than 100 characters.',
            'collins_cs.max'    => 'Czech must be no longer than 100 characters.',
            'collins_da.max'    => 'Danish must be no longer than 100 characters.',
            'collins_de.max'    => 'German must be no longer than 100 characters.',
            'collins_el.max'    => 'Greek must be no longer than 100 characters.',
            'collins_es_es.max' => 'European Spanish must be no longer than 100 characters.',
            'collins_es_la.max' => 'Latin American Spanish must be no longer than 100 characters.',
            'collins_fi.max'    => 'Finnish must be no longer than 100 characters.',
            'collins_fr.max'    => 'French must be no longer than 100 characters.',
            'collins_hr.max'    => 'Croatian must be no longer than 100 characters.',
            'collins_it.max'    => 'Italian must be no longer than 100 characters.',
            'collins_ja.max'    => 'Japanese must be no longer than 100 characters.',
            'collins_ko.max'    => 'Korean must be no longer than 100 characters.',
            'collins_nl.max'    => 'Dutch must be no longer than 100 characters.',
            'collins_no.max'    => 'Norwegian must be no longer than 100 characters.',
            'collins_pl.max'    => 'Polish must be no longer than 100 characters.',
            'collins_pt_br.max' => 'Brazilian Portuguese must be no longer than 100 characters.',
            'collins_pt_pt.max' => 'European Portuguese must be no longer than 100 characters.',
            'collins_ro.max'    => 'Romanian must be no longer than 100 characters.',
            'collins_ru.max'    => 'Russian must be no longer than 100 characters.',
            'collins_sv.max'    => 'Swedish must be no longer than 100 characters.',
            'collins_th.max'    => 'Thai must be no longer than 100 characters.',
            'collins_tr.max'    => 'Turkish must be no longer than 100 characters.',
            'collins_uk.max'    => 'Ukrainian must be no longer than 100 characters.',
            'collins_vi.max'    => 'Vietnamese must be no longer than 100 characters.',
            'collins_zh.max'    => 'Chinese must be no longer than 100 characters.',
            'active:in'         => 'Active must be either 0 or 1.'
        ];
    }
}
