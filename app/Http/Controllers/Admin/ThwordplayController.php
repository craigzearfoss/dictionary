<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Grade;
use App\Models\Language;
use App\Models\Thwordplay;
use \Illuminate\Http\Request;

class ThwordplayController extends BaseController
{
    /**
     * Display a listing of Thwordplays.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($filter = $request->get('filter')) {
            $data = Thwordplay::where('subject', 'like', $filter)->orderBy('subject', 'asc')->paginate($this->paginationValue);
        } else {
            $data = Thwordplay::orderBy('subject', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.thwordplay.index', compact('data', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new Thwordplay.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thwordplay = new Thwordplay();
        $action     = route('api.v1.thwordplay.store');
        $method     = 'post';
        $categories = Category::selectOptions();
        $grades     = Grade::selectOptions();
        $languages  = Language::selectOptions('full');

        return view('admin.thwordplay.edit', compact(
            'thwordplay',
            'action',
            'method',
            'categories',
            'grades',
            'languages'
        ));
    }

    /**
     * Display the specified Thwordplay.
     *
     * @param  Thwordplay $thwordplay
     * @return \Illuminate\Http\Response
     */
    public function show(Thwordplay $thwordplay)
    {
        return view('admin.thwordplay.show', compact('thwordplay'));
    }

    /**
     * Show the form for editing the specified Thwordplay.
     *
     * @param  Thwordplay $thwordplay
     * @return \Illuminate\Http\Response
     */
    public function edit(Thwordplay $thwordplay)
    {
        $action     = route('api.v1.thwordplay.update', $thwordplay->id);
        $method     = 'put';
        $categories = Category::selectOptions();
        $grades     = Grade::selectOptions();
        $languages  = Language::selectOptions('full');

        return view('admin.thwordplay.edit', compact(
            'thwordplay',
            'action',
            'method',
            'categories',
            'grades',
            'languages'
        ));
    }
}
