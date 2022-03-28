<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends BaseController
{
    /**
     * Return a listing of Categories.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return Category::orderBy('id', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Category.
     *
     * @param  Category $category
     * @return JsonResponse
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param  CategoryRequest $categoryRequest
     * @return JsonResponse
     */
    public function store(CategoryRequest $categoryRequest)
    {
        $categoryRequest->validate($categoryRequest->rules(), $categoryRequest->messages());

        try {
            if ($category = Category::create($categoryRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $category;
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Category successfully created.';
        return response()->json($this->response, 201);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  CategoryRequest $categoryRequest
     * @param  Category $category
     * @return JsonResponse
     */
    public function update(CategoryRequest $categoryRequest, Category $category)
    {
        try {
            if ($category->update($categoryRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $category;
            } else {
                $this->response['message'] = 'WTF';
                return response()->json($this->response, 500);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Category successfully updated.';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  Category $category
     * @return JsonResponse
     */
    public function delete(Category $category)
    {
        try {
            if ($category->delete()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Category successfully deleted.';
            } else {
                $this->response['message'] = 'Category could not be deleted.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Activate the specified Category.
     *
     * @param  Request $request
     * @param  Category $category
     * @return JsonResponse
     */
    public function activate(\Illuminate\Http\Request $request, Category $category)
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
                $category->active = $active;
                if ($category->save()) {
                    $this->response['success'] = 1;
                    $this->response['message'] = 'Category successfully ' . ($active ? 'active' : 'inactivated') . '.';
                } else {
                    $this->response['message'] = 'Category could not be ' . ($active ? 'active' : 'inactivated') . '.';
                }
            } catch (\Exception $e) {
                $this->response['message'] = $e->getMessage();
            }
        }

        return response()->json($this->response, 200);
    }
}
