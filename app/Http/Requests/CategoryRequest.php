<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends BaseFormRequest
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
            'name' => 'required|max:50',
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
            'name.unique'   => 'Category name must be unique.',
            'name.required' => 'Category name  is required.',
            'name.max'      => 'Category name must be longer than 10 characters'
        ];
    }
}
