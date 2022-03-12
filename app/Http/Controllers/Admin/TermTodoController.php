<?php

namespace App\Http\Controllers\Admin;

use App\Models\TermTodo;
use Illuminate\Http\Request;

class TermTOdoController extends BaseController
{
    protected $filters = [
        0 => '(none)',
        1 => 'Processed',
        2 => 'Skipped',
        3 => 'Unprocessed',
        4 => 'Unprocessed and Unskipped',
        5 => 'Unverified',
        6 => 'Verified'
    ];

    const FILTER_NONE = 0;
    const FILTER_PROCESSED = 1;
    const FILTER_SKIPPED = 2;
    const FILTER_UNPROCESSED = 3;
    const FILTER_UNPROCESSED_AND_UNSKIPPED = 4;
    const FILTER_UNVERIFIED = 5;
    const FILTER_VERIFIED = 6;


    /**
     * Display a listing of the TermTodo.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = $this->filters;
        $filter = $request->get('filter');
        if ( empty($filter) || !in_array($filter, array_keys($filters))) {
            $filter = self::FILTER_UNPROCESSED_AND_UNSKIPPED;
        }

        $builder = TermTodo::select('*');

        switch ($filter) {
            case self::FILTER_PROCESSED;
                $builder->where('processed', 1);
                break;
            case self::FILTER_SKIPPED;
                $builder->where('skipped', 1);
                break;
            case self::FILTER_UNPROCESSED;
                $builder->where('processed', 0);
                break;
            case self::FILTER_UNPROCESSED_AND_UNSKIPPED;
                $builder->where('processed', 0)->where('skipped', 0);
                break;
            case self::FILTER_UNVERIFIED;
                $builder->where('verified', 0);
                break;
            case self::FILTER_VERIFIED;
                $builder->where('verified', 1);
                break;
        }

        $data = $builder->orderBy('created_at', 'asc')->paginate($this->paginationValue);

        return view('admin.term_todo.index', compact('data', 'filters', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new TermTodo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $termTodo = new TermTodo();
        $action   = route('api.v1.term_todo.store');
        $method   = 'post';

        return view('admin.term_todo.edit', compact('termTodo', 'action', 'method'));
    }

    /**
     * Display the specified TermTodo.
     *
     * @param  TermTodo $termTodo
     * @return \Illuminate\Http\Response
     */
    public function show(TermTodo $termTodo)
    {
        return view('admin.term_todo.show', compact('termTodo'));
    }

    /**
     * Show the form for editing the specified TermTodo.
     *
     * @param  TermTodo $termTodo
     * @return \Illuminate\Http\Response
     */
    public function edit(TermTodo $termTodo)
    {
        $action = route('api.v1.term_todo.update', $termTodo->id);
        $method = 'put';
        return view('admin.term_todo.edit', compact('termTodo', 'action', 'method'));
    }
}
