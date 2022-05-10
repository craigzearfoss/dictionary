<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Grade;
use App\Models\Language;
use App\Models\Thwordplay;
use App\Models\ThwordplayBase;
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
        $bases      = ThwordplayBase::selectOptions();
        $categories = Category::selectOptions();
        $grades     = Grade::selectOptions();
        $languages  = Language::selectOptions('full');

        return view('admin.thwordplay.edit', compact(
            'thwordplay',
            'action',
            'method',
            'bases',
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
        $bases      = ThwordplayBase::selectOptions();
        $categories = Category::selectOptions();
        $grades     = Grade::selectOptions();
        $languages  = Language::selectOptions('full');

        return view('admin.thwordplay.edit', compact(
            'thwordplay',
            'action',
            'method',
            'bases',
            'categories',
            'grades',
            'languages'
        ));
    }

    /**
     * Display a listing of ThwordplayBases.
     *
     * @return \Illuminate\Http\Response
     */
    public function bases()
    {
        $data = ThwordplayBase::orderBy('name', 'asc')->paginate($this->paginationValue);
        return view('admin.thwordplay.bases', compact('data'));
    }

    /**
     * Display the main search page.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $query  = $request->get('query', '');
        $field = $request->get('field', 'subject');
        $dfields = ['subject', 'prompt', 'prompt2'];

        $searchFields = [
            'subject'     => 'Subject',
            'prompt'      => 'Prompt',
            'prompt2'     => 'Prompt 2',
            'title'       => 'Title',
            'description' => 'Description',
            'synonyms'    => 'Synonyms',
            'terms'       => 'Terms',
            'bonuses'     => 'Bonuses',
        ];

        if (!in_array($field, array_keys($searchFields))) {
            $searchField = 'subject';
        }

        return view('admin.thwordplay.search', compact(
            'query', 'field', 'searchFields', 'dfields'
        ));
    }
}
