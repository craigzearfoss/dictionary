<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;

class TagController extends BaseController
{
    /**
     * Display a listing of the Tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tag::orderBy('name', 'asc')->paginate($this->paginationValue);

        return view('admin.tag.index', compact('data'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new Tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = new Tag();
        $action = route('api.v1.tag.store');
        $method = 'post';

        return view('admin.tag.edit', compact('tag', 'action', 'method'));
    }

    /**
     * Display the specified Tag.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified Tag.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $action = route('api.v1.tag.update', $tag->id);
        $method = 'put';
        return view('admin.tag.edit', compact('tag', 'action', 'method'));
    }
}
