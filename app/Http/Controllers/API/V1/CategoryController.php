<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends \App\Http\Controllers\API\BaseController
{
    public function index()
    {
        return Category::orderBy('short', 'asc')->paginate($this->paginationValue);
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function store(CategoryCategoryequest $categoryRequest)
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

        $this->response['message'] = 'Category successfully saved.';
        return response()->json($this->response, 201);
    }

    public function update(CategoryRequest $categoryRequest, Category $category)
    {
        try {
            if ($category->update($categoryRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $category;
            } else {
                $this->response['messsage'] = 'WTF';
                return response()->json($this->response, 500);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Category successfully updated.';
        return response()->json($this->response, 500);
    }

    public function delete(Category $category)
    {
        $category->delete();

        return response()->json(null, 204);
    }
}
