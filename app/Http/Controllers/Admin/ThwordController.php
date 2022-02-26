<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Grade;
use App\Models\Lang;
use App\Models\Thword;
use \Illuminate\Http\Request;

class ThwordController extends BaseController
{
    /**
     * Display a listing of Thwords.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($filter = $request->get('filter')) {
            $data = Thword::where('subject', 'like', $filter)->orderBy('subject', 'asc')->paginate($this->paginationValue);
        } else {
            $data = Thword::orderBy('subject', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.thword.index', compact('data'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new Thword.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thword = new Thword();
        $action = route('api.v1.thword.store');
        $method = 'post';
        $categories = Category::selectOptions();
        $grades = Grade::selectOptions();
        $langs = Lang::selectOptions('full');
        $langId = 2;

        return view('admin.thword.edit', compact(
            'thword',
            'action',
            'method',
            'categories',
            'grades',
            'langs'
        ));
    }

    /**
     * Display the specified Thword.
     *
     * @param  Thword $thword
     * @return \Illuminate\Http\Response
     */
    public function show(Thword $thword)
    {
        return view('admin.thword.show', compact('thword'));
    }

    /**
     * Show the form for editing the specified Thword.
     *
     * @param  Thword $thword
     * @return \Illuminate\Http\Response
     */
    public function edit(Thword $thword)
    {
        $action = route('api.v1.thword.update', $thword->id);
        $method = 'put';
        $categories = Category::selectOptions();
        $grades = Grade::selectOptions();
        $langs = Lang::selectOptions('full');

        return view('admin.thword.edit', compact(
            'thword',
            'action',
            'method',
            'categories',
            'grades',
            'langs'
        ));
    }
}
