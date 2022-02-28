<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use \Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Display a listing of Categories.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($filter = $request->get('filter')) {
            $data = Category::where('name', 'like', $filter)->orderBy('name', 'asc')->paginate($this->paginationValue);
        } else {
            $data = Category::orderBy('name', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.category.index', compact('data', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        $action = route('api.v1.category.store');
        $method = 'post';

        return view('admin.category.edit', compact('category', 'action', 'method'));
    }

    /**
     * Display the specified Category.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $action = route('api.v1.category.update', $category->id);
        $method = 'put';
        return view('admin.category.edit', compact('category', 'action', 'method'));
    }
}
