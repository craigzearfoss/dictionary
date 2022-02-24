<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

class UserController extends BaseController
{
    /**
     * Display a listing of Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('name', 'asc')->paginate($this->paginationValue);

        return view('admin.user.index', compact('data'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $action = route('api.v1.user.store');
        $method = 'post';

        return view('admin.user.edit', compact('user', 'action', 'method'));
    }

    /**
     * Display the specified User.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $action = route('api.v1.user.update', $user->id);
        $method = 'put';
        return view('admin.user.edit', compact('user', 'action', 'method'));
    }
}
