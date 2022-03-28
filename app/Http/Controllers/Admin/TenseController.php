<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tense;
use \Illuminate\Http\Request;

class TenseController extends BaseController
{
    /**
     * Display a listing of Tenses.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($filter = $request->get('filter')) {
            $data = Tense::where('name', 'like', $filter)->orderBy('name', 'asc')->paginate($this->paginationValue);
        } else {
            $data = Tense::orderBy('name', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.tense.index', compact('data', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }


    /**
     * Show the form for creating a new Tense.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tense  = new Tense();
        $action = route('api.v1.tense.store');
        $method = 'post';

        $tenseOptions = Tense::selectOptions();

        return view('admin.tense.edit', compact(
            'tense',
            'action',
            'method',
            'tenseOptions'
        ));
    }

    /**
     * Display the specified Tense.
     *
     * @param  Tense $tense
     * @return \Illuminate\Http\Response
     */
    public function show(Tense $tense)
    {
        return view('admin.tense.show', compact('tense'));
    }

    /**
     * Show the form for editing the specified Tense.
     *
     * @param  Tense  $tense
     * @return \Illuminate\Http\Response
     */
    public function edit(Tense $tense)
    {
        $action = route('api.v1.language.update', $tense->id);
        $method = 'put';

        $tenseOptions = Tense::selectOptions();

        return view('admin.tense.edit', compact(
            'tense',
            'action',
            'method',
            'tenseOptions'
        ));
    }
}
