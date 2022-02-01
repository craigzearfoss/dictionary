<?php

namespace App\Http\Controllers\Admin;

use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends \App\Http\Controllers\Admin\BaseController
{
    protected $validateArray = [
        'abbrev'         => 'required',
        'full'           => 'required',
        'short'          => 'required',
        'code'           => 'required',
        'name'           => 'required',
        'directionality' => 'required',
        'local'          => 'required',
        'wiki'           => 'required'
    ];

    /**
     * Display a listing of the resource.
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.term.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function show(Term $term)
    {
        return view('admin.term.show', compact('term'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term)
    {
        return view('admin.term.edit', compact('term'));
    }
}
