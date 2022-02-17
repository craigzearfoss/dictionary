<?php

namespace App\Http\Controllers\Admin;

use App\Models\TermTodo;

class TermTOdoController extends BaseController
{
    /**
     * Display a listing of the TermTodo.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TermTodo::orderBy('created_at', 'asc')->paginate($this->paginationValue);

        return view('admin.term_todo.index', compact('data'))
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
        $action = route('api.v1.term_todo.store');
        $method = 'post';

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
