<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TileRequest extends BaseFormRequest
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
            'language_id'    => 'int',
            'symbol'         => 'required|max:3',
            'base_symbol'    => 'required|max:3',
            'char_case'      => 'in:upper,lower,none',
            'seq'            => 'int',
            'krow'           => 'int',
            'kcol'           => 'int',
            'cnt'            => 'int',
            'name'           => 'max:50',
            'description'    => 'max:255',
            'dec'            => 'int',
            'oct'            => 'max:3',
            'hex'            => 'max:2',
            'bin'            => 'max:8',
            'html_number'    => 'max:6',
            'html_name'      => 'max:10',
            'value'          => 'int'
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
            'language_id.int'      => 'language_id must be an integer.',
            'symbol.required'      => 'Symbol is required.',
            'symbol.max'           => 'Symbol must be no longer than 3 characters.',
            'base_symbol.required' => 'Base Symbol is required.',
            'base_symbol.max'      => 'Symbol must be no longer than 3 characters.',
            'char_case.max'        => "Character case must be 'upper', 'lower' or 'none'.",
            'seq.int'              => 'Sequence must be an integer.',
            'krow.int'             => 'Keyboard row must be an integer.',
            'kcol.int'             => 'Keyboard column must be an integer.',
            'cnt.int'              => 'Tile count must be an integer.',
            'name.max'             => 'Name must be no longer than 50 characters.',
            'description.max'      => 'Description must be no longer than 255 characters.',
            'dec.int'              => 'Decimal count must be an integer.',
            'oct.max'              => 'Oct must be no longer than 3 characters.',
            'hex.max'              => 'Hex must be no longer than 2 characters.',
            'bin.max'              => 'Bin must be no longer than 8 characters.',
            'html_number.max'      => 'HTML name must be no longer than 6 characters.',
            'html_name.max'        => 'HTML number must be no longer than 10 characters.',
            'value.int'            => 'Value must be an integer.'
        ];
    }
}
