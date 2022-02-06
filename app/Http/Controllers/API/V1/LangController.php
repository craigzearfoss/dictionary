<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\LangRequest;
use App\Models\Lang;

class LangController extends BaseController
{
    /**
     * Return a listing of the Lang.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Lang::orderBy('short', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Lang.
     *
     * @param  Lang $lang
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Lang $lang)
    {
        return $lang;
    }

    /**
     * Store a newly created Lang in storage.
     *
     * @param LangRequest $langRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(LangRequest $langRequest)
    {
        $langRequest->validate($langRequest->rules(), $langRequest->messages());

        try {
            if ($lang = Lang::create($langRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $lang;
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Language successfully created.';
        return response()->json($this->response, 201);
    }

    /**
     * Update the specified Lang in storage.
     *
     * @param  LangRequest $langRequest
     * @param  Lang $lang
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(LangRequest $langRequest, Lang $lang)
    {
        try {
            if ($lang->update($langRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $lang;
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
     * Remove the specified Lang from storage.
     *
     * @param  Lang $lang
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Lang $lang)
    {
        try {
            if ($lang->delete()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Lang successfully deleted.';
            } else {
                $this->response['message'] = 'Lang could not be deleted.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Disable the specified Lang.
     *
     * @param  Lang $lang
     * @return \Illuminate\Http\JsonResponse
     */
    public function disable(Lang $lang)
    {
        try {
            $lang->enabled = 0;
            if ($lang->save()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Lang successfully disabled.';
            } else {
                $this->response['message'] = 'Lang could not be disabled.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Enable the specified Lang.
     *
     * @param  Lang $lang
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(Lang $lang)
    {
        try {
            $lang->enabled = 1;
            if ($lang->save()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Lang successfully enabled.';
            } else {
                $this->response['message'] = 'Lang could not be enabled.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }
}
