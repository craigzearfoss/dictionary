<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\CollinsTagRequest;
use App\Models\CollinsTag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollinsTagController extends BaseController
{
    /**
     * Return a listing of CollinsTags.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return CollinsTag::orderBy('id', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified CollinsTag.
     *
     * @param  CollinsTag $collinsTag
     * @return JsonResponse
     */
    public function show(CollinsTag $collinsTag)
    {
        return $collinsTag;
    }

    /**
     * Store a newly created CollinsTag in storage.
     *
     * @param  CollinsTagRequest $collinsTagRequest
     * @return JsonResponse
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

        $this->response['message'] = 'Collins Tag successfully created.';
        return response()->json($this->response, 201);
    }

    /**
     * Update the specified CollinsTag in storage.
     *
     * @param  CollinsTagRequest $collinsTagRequest
     * @param  CollinsTag $collinsTag
     * @return JsonResponse
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

        $this->response['message'] = 'Collins Tag successfully updated.';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified CollinsTag from storage.
     *
     * @param  CollinsTag $collinsTag
     * @return JsonResponse
     */
    public function delete(CollinsTag $collinsTag)
    {
        try {
            if ($collinsTag->delete()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Collins Tag successfully deleted.';
            } else {
                $this->response['message'] = 'Collins Tag could not be deleted.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Activate the specified CollinsTag.
     *
     * @param  Request $request
     * @param  CollinsTag $collinsTag
     * @return JsonResponse
     */
    public function activate(\Illuminate\Http\Request $request, CollinsTag $collinsTag)
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
                $collinsTag->active = $active;
                if ($collinsTag->save()) {
                    $this->response['success'] = 1;
                    $this->response['message'] = 'Collins Tag successfully ' . ($active? 'active' : 'inactivated') . '.';
                } else {
                    $this->response['message'] = 'Collins Tag could not be ' . ($active ? 'active' : 'inactivated') . '.';
                }
            } catch (\Exception $e) {
                $this->response['message'] = $e->getMessage();
            }
        }

        return response()->json($this->response, 200);
    }
}
