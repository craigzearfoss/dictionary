<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TermTodoRequest extends BaseFormRequest
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
            'term'          => 'required|max:50',
            'processed'     => 'in:0,1',
            //'notes'         => ''
            'lang_id'       => 'required|int'
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
            'term.required'    => 'Term is required.',
            'term.max'         => 'Term must be longer than 50 characters.',
            'lang_id.required' => 'Language is required',
            'lang_id.int'      => 'lang_id must be an integer.',
            'processed:in'     => 'Processed must be either 0 or 1.'
        ];
    }
}
