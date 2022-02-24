<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends BaseController
{
    /**
     * Return a listing of Tags.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Tag::orderBy('name', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Tag.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Tag $tag)
    {
        return $tag;
    }

    /**
     * Store a newly created Tag in storage.
     *
     * @param TagRequest $tagRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TagRequest $tagRequest)
    {
        $tagRequest->validate($tagRequest->rules(), $tagRequest->messages());

        try {
            if ($tag = Tag::create($tagRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $tag;
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Tag successfully created.';
        return response()->json($this->response, 201);
    }

    /**
     * Update the specified Tag in storage.
     *
     * @param  TagRequest $tagRequest
     * @param  Tag $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TagRequest $tagRequest, Tag $tag)
    {
        try {
            if ($tag->update($tagRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $tag;
            } else {
                $this->response['message'] = 'WTF';
                return response()->json($this->response, 500);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Tag successfully updated.';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified Tag from storage.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Tag $tag)
    {
        try {
            if ($tag->delete()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Tag successfully deleted.';
            } else {
                $this->response['message'] = 'Tag could not be deleted.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Activate the specified Tag.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tag $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function activate(\Illuminate\Http\Request $request, Tag $tag)
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
                $tag->active = $active;
                if ($tag->save()) {
                    $this->response['success'] = 1;
                    $this->response['message'] = 'Tag successfully ' . ($active ? 'active' : 'inactivated') . '.';
                } else {
                    $this->response['message'] = 'Tag could not be ' . ($active ? 'active' : 'inactivated') . '.';
                }
            } catch (\Exception $e) {
                $this->response['message'] = $e->getMessage();
            }
        }

        return response()->json($this->response, 200);
    }
}
