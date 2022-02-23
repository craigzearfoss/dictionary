<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TileSetRequest extends BaseFormRequest
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
                'max:20',
                Rule::unique('tile_sets')->ignore($this->tile_set)
            ],
            'official'  => 'in:0,1',
            'lang_id'  => 'int',
            'num_tiles'  => 'int',
            'active'  => 'in:0,1'
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
            'name.unique'   => 'Tile set name already exists.',
            'name.required' => 'Tile set name is required.',
            'name.max'      => 'Tile set name must be no longer than 20 characters.',
            'official:in'   => 'official must be either 0 or 1.',
            'num_tiles.int' => 'num_tiles must be an integer.',
            'active:in'     => 'Active must be either 0 or 1.'
        ];
    }
}
