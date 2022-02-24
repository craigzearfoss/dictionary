<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TermRequest;
use App\Models\Term;

class TermController extends BaseController
{
    /**
     * Return a listing of Terms.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Term::orderBy('term', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Term.
     *
     * @param  Term $term
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Term $term)
    {
        return $term;
    }

    /**
     * Store a newly created Term in storage.
     *
     * @param TermRequest $termRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TermRequest  $termRequest)
    {
        // is this a duplicate term?
        $this->response['duplicates'] = [];
        $duplicateTerms = Term::findDuplicates($termRequest);

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
     * Update the specified Term in storage.
     *
     * @param  TermRequest $termRequest
     * @param  Term $term
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TermRequest $termRequest, Term $term)
    {
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
     * Remove the specified Term from storage.
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
     * Activate the specified Term.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Term $term
     * @return \Illuminate\Http\JsonResponse
     */
    public function activate(\Illuminate\Http\Request $request, Term $term)
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
                $term->active = $active;
                if ($term->save()) {
                    $this->response['success'] = 1;
                    $this->response['message'] = 'Term successfully ' . ($active ? 'active' : 'inactivated') . '.';
                } else {
                    $this->response['message'] = 'Term could not be ' . ($active ? 'active' : 'inactivated') . '.';
                }
            } catch (\Exception $e) {
                $this->response['message'] = $e->getMessage();
            }
        }

        return response()->json($this->response, 200);
    }
}
