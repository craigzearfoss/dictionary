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
     * Update the specified term in storage.
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
     * Enable the specified term.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Term $term
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(\Illuminate\Http\Request $request, Term $term)
    {
        $params = $request->all();
        if (!array_key_exists('enabled', $params)) {

            $this->response = [
                'success' => 0,
                'message' => '"enabled" parameter not specified.'
            ];

        } else {

            $enabled = $params['enabled'];
            try {
                $term->enabled = $enabled;
                if ($term->save()) {
                    $this->response['success'] = 1;
                    $this->response['message'] = 'Term successfully ' . ($enabled ? 'enabled' : 'disabled') . '.';
                } else {
                    $this->response['message'] = 'Term could not be ' . ($enabled ? 'enabled' : 'disabled') . '.';
                }
            } catch (\Exception $e) {
                $this->response['message'] = $e->getMessage();
            }
        }

        return response()->json($this->response, 200);
    }
}
