<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ThwordplayRequest extends BaseFormRequest
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
                'max:100',
                Rule::unique('thwordplays')->ignore($this->thwordplay)
            ],
            'base_id'       => 'required|int',
            'prompt'        => 'max:20',
            'prompt2'       => 'max:100',
            'title'         => 'max:255',
            'description'   => 'max:255',
            'language_id'   => 'required|int',
            'category_id'   => 'required|int',
            'grade_id'      => 'required|int',
            //'synonyms'      => 'required',
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
            'subject.max'           => 'Subject must be longer than 100 characters.',
            'subject.unique'        => 'Subject already exists.',
            'prompt.max'            => 'Prompt must be longer than 20 characters.',
            'prompt2.max'           => 'Prompt 2 must be longer than 100 characters.',
            'base_id.required'      => 'Base is required',
            'base_id.int'           => 'base_id must be an integer.',
            'title.max'             => 'Title must be longer than 255 characters.',
            'description.max'       => 'Description must be longer than 255 characters.',
            'language_id.required'  => 'Language is required',
            'language_id.int'       => 'language_id must be an integer.',
            'category_id.required'  => 'Category is required',
            'category_id.int'       => 'category_id must be an integer.',
            'grade_id.required'     => 'Grade is required',
            'grade_id.int'          => 'grade_id must be an integer.',
            //'synonyms.required'     => 'Answers are required.',
            //'antonyms.required'     => 'Answers are required.',
            'active:in'             => 'Active must be either 0 or 1.'
        ];
    }
}
