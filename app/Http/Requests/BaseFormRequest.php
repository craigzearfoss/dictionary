<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

abstract class BaseFormRequest extends FormRequest
{
    const RESPONSE_ARRAY = [
        'success' => 0,
        'message' => null,
        'errors'  => [],
        'data'    => []
    ];

    /**
     * Returns a standardized json response object with errors when validation fails.
     * This overrides the default method which does a page redirect.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function failedValidation(Validator $validator)
    {
        $resp = self::RESPONSE_ARRAY;
        $resp['message'] = 'Record could not be save. Please fix the following errors.';
        $resp['errors'] = $validator->errors();

        throw new HttpResponseException(
            response()->json($resp, JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();
}
