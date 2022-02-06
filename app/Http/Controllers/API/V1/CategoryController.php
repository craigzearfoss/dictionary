<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends BaseController
{
    /**
     * Return a listing of the Category.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Category::orderBy('name', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Category.
     *
     * @param  Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CategoryRequest $categoryRequest
     * @return \Illuminate\Http\JsonResponse
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
     * @return \Illuminate\Http\JsonResponse
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
     * @return \Illuminate\Http\JsonResponse
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
     * Disable the specified Category.
     *
     * @param  Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function disable(Category $category)
    {
        try {
            $category->enabled = 0;
            if ($category->save()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Category successfully disabled.';
            } else {
                $this->response['message'] = 'Category could not be disabled.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Enable the specified Category.
     *
     * @param  Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(Category $category)
    {
        try {
            $category->enabled = 1;
            if ($category->save()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Category successfully enabled.';
            } else {
                $this->response['message'] = 'Category could not be enabled.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }
}
