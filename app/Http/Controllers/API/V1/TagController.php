<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends BaseController
{
    /**
     * Return a listing of the tags.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Tag::orderBy('name', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified tag.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Tag $tag)
    {
        return $tag;
    }

    /**
     * Store a newly created tag in storage.
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
     * Update the specified tag in storage.
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
     * Remove the specified tag from storage.
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
     * Enable the specified tag.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(\Illuminate\Http\Request $request, Tag $tag)
    {
        $params = $request->all();
        if (!array_key_exists('enabdled', $params)) {

            $this->response = [
                'success' => 0,
                'message' => '"enabled" parameter not specified.'
            ];

        } else {

            $enabled = $params['enabled'];
            try {
                $tag->enabled = $request->enabled;
                if ($tag->save()) {
                    $this->response['success'] = 1;
                    $this->response['message'] = 'Tag successfully ' . ($enabled ? 'enabled' : 'disabled') . '.';
                } else {
                    $this->response['message'] = 'Tag could not be ' . ($enabled ? 'enabled' : 'disabled') . '.';
                }
            } catch (\Exception $e) {
                $this->response['message'] = $e->getMessage();
            }
        }

        return response()->json($this->response, 200);
    }
}