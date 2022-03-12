<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\LanguageRequest;
use App\Models\Language;

class LanguageController extends BaseController
{
    /**
     * Return a listing of Languages.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Language::orderBy('short', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Language.
     *
     * @param  Language $language
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Language $language)
    {
        return $language;
    }

    /**
     * Store a newly created Language in storage.
     *
     * @param LanguageRequest $languageRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(LanguageRequest $languageRequest)
    {
        $languageRequest->validate($languageRequest->rules(), $languageRequest->messages());

        try {
            if ($language = Language::create($languageRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $language;
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Language successfully created.';
        return response()->json($this->response, 201);
    }

    /**
     * Update the specified Language in storage.
     *
     * @param  LanguageRequest $languageRequest
     * @param  Language $language
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(LanguageRequest $languageRequest, Language $language)
    {
        try {
            if ($language->update($languageRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $language;
            } else {
                $this->response['message'] = 'WTF';
                return response()->json($this->response, 500);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Language successfully updated.';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified Language from storage.
     *
     * @param  Language $language
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Language $language)
    {
        try {
            if ($language->delete()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Language successfully deleted.';
            } else {
                $this->response['message'] = 'Language could not be deleted.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Activate the specified Language.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Language $language
     * @return \Illuminate\Http\JsonResponse
     */
    public function activate(\Illuminate\Http\Request $request, Language $language)
    {
        $params = $request->all();
        if (!array_key_exists('active', $params)) {

            $this->response = [
                'success' => 0,
                'message' => '"active" parameter not specified.'
            ];

        } else {

            $active = $params['active'];
            try {
                $language->active = $active;
                if ($language->save()) {
                    $this->response['success'] = 1;
                    $this->response['message'] = 'Language successfully ' . ($active ? 'active' : 'inactivated') . '.';
                } else {
                    $this->response['message'] = 'Language could not be ' . ($active ? 'active' : 'inactivated') . '.';
                }
            } catch (\Exception $e) {
                $this->response['message'] = $e->getMessage();
            }
        }

        return response()->json($this->response, 200);
    }
}
