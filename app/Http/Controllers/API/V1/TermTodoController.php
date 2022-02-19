<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TermTodoRequest;
use App\Models\TermTodo;

class TermTodoController extends BaseController
{
    /**
     * Return a listing of the term to-dos.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return TermTodo::orderBy('term', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified term to-do.
     *
     * @param  TermTodo $termTodo
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(TermTodo $termTodo)
    {
        return $termTodo;
    }

    /**
     * Store a newly created term to-do in storage.
     *
     * @param TermTodoRequest $termTodoRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TermTodoRequest  $termTodoRequest)
    {die('NOT IMPLMENTED YET');
        // is this a duplicate term?
        $this->response['duplicates'] = [];
        $duplicateTerms = Term::findDuplicates($termToRequest);

        if ($duplicateTerms->count() > 0) {
            $this->response['duplicates'] = $duplicateTerms;
            return response()->json($this->response, 200);
        }

        $termRequest->validate($termRequest->rules(), $termRequest->messages());

        $duplicateTerms = Term::where('term', $termRequest->get('term'))
            ->where('pos_id', $termRequest->get('pos_id'))
            ->where('collins_def', $termRequest->get('collins_def'))->get();

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
     * Update the specified term to-do in storage.
     *
     * @param  TermTodoRequest $termTodoRequest
     * @param  TermTodo $termTodo
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TermTodoRequest $termTodoRequest, TermTodo $termTodo)
    {die('NOT IMPLEMENTED YET');
        // is this a duplicate term?
        $this->response['duplicates'] =[];
        $duplicateTerms = Term::findDuplicates($termRequest, $term->id);

        if ($duplicateTerms->count() > 0) {
            $this->response['duplicates'] = $duplicateTerms;
            return response()->json($this->response, 200);
        }

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

        $this->response['message'] = 'Term successfully updated.';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified term to-do from storage.
     *
     * @param  TermTodo $termTodo
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(TermTodo $termTodo)
    {
        try {
            if ($termTodo->delete()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Term To-do successfully deleted.';
            } else {
                $this->response['message'] = 'Term To-do could not be deleted.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Mark the specified term to-do as processed.
     *
     * @param  TermTodo $termTodo
     * @return \Illuminate\Http\JsonResponse
     */
    public function process(TermTodo $termTodo)
    {
        try {
            if ($termTodo->update(['processed' => 1, 'processed_at' => date("Y-m-d H:i:s")])) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Term To-do marked as processed';
                $this->response['data'] = $termTodo;
            } else {
                $this->response['message'] = 'Term To-do could not be marked as processed';
                return response()->json($this->response, 500);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        return response()->json($this->response, 200);
    }

    /**
     * Mark the specified term to-do as skipped.
     *
     * @param  TermTodo $termTodo
     * @return \Illuminate\Http\JsonResponse
     */
    public function skip(TermTodo $termTodo)
    {
        try {
            if ($termTodo->update(['skipped' => 1, 'skipped_at' => date("Y-m-d H:i:s")])) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Term To-do marked as skipped';
                $this->response['data'] = $termTodo;
            } else {
                $this->response['message'] = 'Term To-do could not be marked as skipped';
                return response()->json($this->response, 500);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        return response()->json($this->response, 200);
    }


    /**
     * Mark the specified term to-do as verified.
     *
     * @param  TermTodo $termTodo
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(TermTodo $termTodo)
    {
        try {
            if ($termTodo->update(['verified' => 1, 'verified_at' => date("Y-m-d H:i:s")])) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Term To-do marked as verified';
                $this->response['data'] = $termTodo;
            } else {
                $this->response['message'] = 'Term To-do could not be marked as verified';
                return response()->json($this->response, 500);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        return response()->json($this->response, 200);
    }
}