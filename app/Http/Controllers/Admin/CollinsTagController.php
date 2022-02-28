<?php

namespace App\Http\Controllers\Admin;

use App\Models\CollinsTag;
use Illuminate\Http\Request;

class CollinsTagController extends BaseController
{
    /**
     * Display a listing of CollinsTags.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($filter = $request->get('filter')) {
            $data = CollinsTag::where('name', 'like', $filter)->orderBy('name', 'asc')->paginate($this->paginationValue);
        } else {
            $data = CollinsTag::orderBy('name', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.collins_tag.index', compact('data', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new CollinsTag.
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
     * Display the specified CollinsTag.
     *
     * @param  CollinsTag $collinsTag
     * @return \Illuminate\Http\Response
     */
    public function show(CollinsTag $collinsTag)
    {
        return view('admin.collins_tag.show', compact('collinsTag'));
    }

    /**
     * Show the form for editing the specified CollinsTag.
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
