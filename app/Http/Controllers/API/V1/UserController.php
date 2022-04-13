<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{
    /**
     * Return a listing of Users.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return User::orderBy('id', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified User.
     *
     * @param  User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  UserRequest $userRequest
     * @return JsonResponse
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
     * Update the specified User in storage.
     *
     * @param  UserRequest $userRequest
     * @param  User $user
     * @return JsonResponse
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
     * Remove the specified User from storage.
     *
     * @param  User $user
     * @return Http\JsonResponse
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
     * Activate the specified User.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return JsonResponse
     */
    public function activate(\Illuminate\Http\Request $request, User $user)
    {
        $params = $request->all();
        if (!array_key_exists('active', $params)) {

            $this->response = [
                'success' => 0,
                'message' => '"active" parameter not specified.'
            ];

        } else {

            $active = $params['active'];
            try {
                $user->active = $active;
                if ($user->save()) {
                    $this->response['success'] = 1;
                    $this->response['message'] = 'User successfully ' . ($active ? 'active' : 'inactivated') . '.';
                } else {
                    $this->response['message'] = 'User could not be ' . ($active ? 'active' : 'inactivated') . '.';
                }
            } catch (\Exception $e) {
                $this->response['message'] = $e->getMessage();
            }
        }

        return response()->json($this->response, 200);
    }
}
