<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TermRequest;
use App\Models\Term;

class TermController extends BaseController
{
    /**
     * Return a listing of the terms.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Term::orderBy('asc', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified term.
     *
     * @param  Term $term
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Term $term)
    {
        return $term;
    }

    /**
     * Store a newly created term in storage.
     *
     * @param TermRequest $termRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TermRequest  $termRequest)
    {
        $termRequest->validate($termRequest->rules(), $termRequest->messages());

        try {
            if ($term = Term::create($termRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $term;
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Term successfully created.';
        return response()->json($this->response, 201);
    }

    /**
     * Update the specified term in storage.
     *
     * @param  TermRequest $termRequest
     * @param  Term $term
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TermRequest $termRequest, Term $term)
    {
        try {
            if ($term->update($termRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $term;
            } else {
                $this->response['message'] = 'WTF';
                return response()->json($this->response, 500);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Language successfully updated.';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified term from storage.
     *
     * @param  Term $term
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Term $term)
    {
        try {
            if ($term->delete()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Term successfully deleted.';
            } else {
                $this->response['message'] = 'Term could not be deleted.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Disable the specified term.
     *
     * @param  Term $term
     * @return \Illuminate\Http\JsonResponse
     */
    public function disable(Term $term)
    {
        try {
            $term->enabled = 0;
            if ($term->save()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Term successfully disabled.';
            } else {
                $this->response['message'] = 'Term could not be disabled.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Enable the specified term.
     *
     * @param  Term $term
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(Term $term)
    {
        try {
            $term->enabled = 1;
            if ($term->save()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Term successfully enabled.';
            } else {
                $this->response['message'] = 'Term could not be enabled.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }
}
