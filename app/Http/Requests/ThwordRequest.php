<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ThwordRequest extends BaseFormRequest
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
            'subject'       => [
                'required',
                'max:50',
                Rule::unique('thwords')->ignore($this->thword)
            ],
            'title'         => 'max:255',
            'description'   => 'max:255',
            'language_id'   => 'required|int',
            'category_id'   => 'required|int',
            'grade_id'      => 'required|int',
            'synonyms'      => 'required',
            //'antonyms'      => 'required',
            'active'        => 'in:0,1'
        ];

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
            'subject.required'      => 'Subject is required.',
            'subject.max'           => 'Subject must be longer than 50 characters.',
            'subject.unique'        => 'Subject already exists.',
            'title.max'             => 'Title must be longer than 255 characters.',
            'description.max'       => 'Description must be longer than 255 characters.',
            'language_id.required'  => 'Language is required',
            'language_id.int'       => 'language_id must be an integer.',
            'category_id.required'  => 'Category is required',
            'category_id.int'       => 'category_id must be an integer.',
            'grade_id.required'     => 'Grade is required',
            'grade_id.int'          => 'grade_id must be an integer.',
            'synonyms.required'     => 'Synonyms is required.',
            'antonyms.required'     => 'Antonyms is required.',
            'active:in'             => 'Active must be either 0 or 1.'
        ];
    }
}
