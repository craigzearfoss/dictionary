<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TenseRequest;
use App\Models\CollinsTag;

class TenseController extends BaseController
{
    /**
     * Return a listing of Tenses.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Tense::orderBy('name', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Tense.
     *
     * @param  Tense $tense
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Tense $tense)
    {
        return $tense;
    }

    /**
     * Store a newly created Tense in storage.
     *
     * @param CollinsTagRequest $tenseRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TenseRequest $tenseRequest)
    {
        $tenseRequest->validate($tenseRequest->rules(), $tenseRequest->messages());

        try {
            if ($tense = Tense::create($tenseRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $tense;
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Tense successfully created.';
        return response()->json($this->response, 201);
    }

    /**
     * Update the specified Tense in storage.
     *
     * @param  TenseRequest $tenseRequest
     * @param  Tense $tense
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TenseRequest $tenseRequest, Tense $tense)
    {
        try {
            if ($tense->update($tenseRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $tense;
            } else {
                $this->response['message'] = 'WTF';
                return response()->json($this->response, 500);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Tense successfully updated.';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified Tense from storage.
     *
     * @param  Tense $tense
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Tense $tense)
    {
        try {
            if ($tense->delete()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Tense successfully deleted.';
            } else {
                $this->response['message'] = 'Tense could not be deleted.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }
}