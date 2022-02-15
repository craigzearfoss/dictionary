<?php

namespace App\Http\Controllers\Sandbox;

use App\Http\Controllers\Controller;

class WhccController extends Controller
{
    /**
     * https://github.com/whcc/skilltest
     * https://github.com/jameswnelson
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function start()
    {
        return view('sandbox.whcc.start');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function test()
    {
        return view('sandbox.whcc.test');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function infinity()
    {
        return view('sandbox.whcc.infinity');
    }
}
