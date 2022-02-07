<?php

namespace App\Http\Controllers\Admin;

use App\Models\Term;
use App\Models\Pos;

class TermController extends BaseController
{
    /**
     * Display a listing of the Term.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Term::orderBy('term', 'asc')->paginate($this->paginationValue);

        return view('admin.term.index', compact('data'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new Term.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $term = new Term();
        $action = route('api.v1.term.store');
        $method = 'post';

        return view('admin.term.edit', compact('term', 'action', 'method'));
    }

    /**
     * Display the specified Term.
     *
     * @param  Term $term
     * @return \Illuminate\Http\Response
     */
    public function show(Term $term)
    {
        return view('admin.term.show', compact('term'));
    }

    /**
     * Show the form for editing the specified Term.
     *
     * @param  Term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term)
    {
        $action = route('api.v1.term.update', $term->id);
        $method = 'put';
        $pos = Pos::selectOptions();

        return view('admin.term.edit', compact('term', 'action', 'method', 'pos'));
    }
}
