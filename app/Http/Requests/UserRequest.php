<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends BaseFormRequest
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
        $rules = [
            'name'   => 'required|min:6|max:50',
            'email'  => [
                'required',
                'email',
                'max:100',
                Rule::unique('users')->ignore($this->user)
            ],
            'active' => 'in:0,1'
        ];

        if (empty($this->user->id)) {
            $rules['password'] = [
                'required',
                'confirmed',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols() //->uncompromised()
            ];
        }
//print_r($rules); die;
        return $rules;
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique'       => 'Name already exists.',
            'name.required'     => 'Name is required.',
            'name.min'          => 'Name must be at least 6 characters.',
            'name.max'          => 'Name must be no longer than 255 characters.',
            'email.unique'      => 'Email already exists.',
            'email.required'    => 'Email is required.',
            'email.max'         => 'Email must be no longer than 100 characters.',
            'password:required' => 'Password is required.',
            'active:in'         => 'Active must be either 0 or 1.'
        ];
    }
}
