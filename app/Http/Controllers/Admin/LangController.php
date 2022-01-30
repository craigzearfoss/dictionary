<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;

class LangController extends Controller
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
        //$data = Lang::latest()->paginate(5);
        $data = Lang::orderBy('short', 'asc')->paginate(15);

        return view('admin.lang.index', compact('data'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validateArray);

        Lang::create($request->all());

        return redirect()->route('admin.lang.index')
            ->with('success', 'Lang created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function show(Lang $lang)
    {
        return view('admin.lang.show', compact('lang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function edit(Lang $lang)
    {
        return view('admin.lang.edit', compact('lang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lang $lang)
    {
        $request->validate($this->validateArray);

        $lang->update($request->all());

        return redirect()->route('admin.lang.index')
            ->with('success', 'Lang updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lang $lang)
    {
        $lang->delete();

        return redirect()->route('admin.lang.index')
            ->with('success', 'Lang deleted successfully');
    }
}
