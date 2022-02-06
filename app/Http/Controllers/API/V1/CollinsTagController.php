<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\CollinsTagRequest;
use App\Models\CollinsTag;

class CollinsTagController extends BaseController
{
    /**
     * Return a listing of the Collins Tag.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Tag::orderBy('name', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Collins Tag.
     *
     * @param  CollinsTag $collinsTag
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(CollinsTag $collinsTag)
    {
        return $collinsTag;
    }

    /**
     * Store a newly created Collins Tag in storage.
     *
     * @param CollinsTagRequest $collinsTagRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CollinsTagRequest $collinsTagRequest)
    {
        $collinsTagRequest->validate($collinsTagRequest->rules(), $collinsTagRequest->messages());

        try {
            if ($collinsTag = CollinsTag::create($collinsTagRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $collinsTag;
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Collins tag successfully created.';
        return response()->json($this->response, 201);
    }

    /**
     * Update the specified Collins Tag in storage.
     *
     * @param  CollinsTagRequest $collinsTagRequest
     * @param  CollinsTag $collinsTag
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CollinsTagRequest $collinsTagRequest, CollinsTag $collinsTag)
    {
        try {
            if ($collinsTag->update($collinsTagRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $collinsTag;
            } else {
                $this->response['message'] = 'WTF';
                return response()->json($this->response, 500);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Collins tag successfully updated.';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified Collins Tag from storage.
     *
     * @param  CollinsTag $collinsTag
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(CollinsTag $collinsTag)
    {
        try {
            if ($collinsTag->delete()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Collins tag successfully deleted.';
            } else {
                $this->response['message'] = 'Collins tag could not be deleted.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Disable the specified Collins Tag.
     *
     * @param  CollinsTag $collinsTag
     * @return \Illuminate\Http\JsonResponse
     */
    public function disable(CollinsTag $collinsTag)
    {
        try {
            $collinsTag->enabled = 0;
            if ($collinsTag->save()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Collins tag successfully disabled.';
            } else {
                $this->response['message'] = 'Collins tag could not be disabled.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Enable the specified Collins Tag.
     *
     * @param  CollinsTag $collinsTag
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(CollinsTag $collinsTag)
    {
        try {
            $collinsTag->enabled = 1;
            if ($collinsTag->save()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Collins tag successfully enabled.';
            } else {
                $this->response['message'] = 'Collins tag could not be enabled.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }
}
