<?php

namespace App\Http\Controllers\Admin;

use App\Models\CollinsTag;
use Illuminate\Http\Request;

class CollinsTagController extends BaseController
{
    /**
     * Display a listing of the Collins Tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CollinsTag::orderBy('name', 'asc')->paginate($this->paginationValue);

        return view('admin.collins_tag.index', compact('data'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new Collins Tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collinsTag = new CollinsTag();
        $action = route('api.v1.collins_tag.store');
        $method = 'post';

        return view('admin.collins_tag.edit', compact('collinsTag', 'action', 'method'));
    }

    /**
     * Display the specified Collins Tag.
     *
     * @param  CollinsTag $collinsTag
     * @return \Illuminate\Http\Response
     */
    public function show(CollinsTag $collinsTag)
    {
        return view('admin.collins_tag.show', compact('collinsTag'));
    }

    /**
     * Show the form for editing the specified Collins Tag.
     *
     * @param  CollinsTag $collinsTag
     * @return \Illuminate\Http\Response
     */
    public function edit(CollinsTag $collinsTag)
    {
        $action = route('api.v1.collins_tag.update', $collinsTag->id);
        $method = 'put';
        return view('admin.collins_tag.edit', compact('collinsTag', 'action', 'method'));
    }
}
