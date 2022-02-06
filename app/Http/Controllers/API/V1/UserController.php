<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends BaseController
{
    /**
     * Return a listing of the users.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return User::orderBy('name', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified user.
     *
     * @param  User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Store a newly created user in storage.
     *
     * @param UserRequest $userRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $userRequest)
    {
        $userRequest->validate($userRequest->rules(), $userRequest->messages());

        try {
            if ($user = User::create($userRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $user;
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'User successfully created.';
        return response()->json($this->response, 201);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  UserRequest $userRequest
     * @param  User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserRequest $userRequest, User $user)
    {
        try {
            if ($user->update($userRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $user;
            } else {
                $this->response['message'] = 'WTF';
                return response()->json($this->response, 500);
            }
        } catch (\Exception $e) {die('rrr');
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'User successfully updated.';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(User $user)
    {
        try {
            if ($user->delete()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'User successfully deleted.';
            } else {
                $this->response['message'] = 'User could not be deleted.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Disable the specified user.
     *
     * @param  User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function disable(User $user)
    {
        try {
            $user->enabled = 0;
            if ($user->save()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'User successfully disabled.';
            } else {
                $this->response['message'] = 'User could not be disabled.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Enable the specified user.
     *
     * @param  User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(User $user)
    {
        try {
            $user->enabled = 1;
            if ($user->save()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'User successfully enabled.';
            } else {
                $this->response['message'] = 'User could not be enabled.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }
}
