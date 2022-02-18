<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\ThwordRequest;
use App\Models\Thword;
use Illuminate\Support\Facades\DB;

class ThwordController extends BaseController
{
    /**
     * Return a listing of the thwords.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Thword::orderBy('subject', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified thword.
     *
     * @param  Thword $thword
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Thword $thword)
    {
        return $thword;
    }

    /**
     * Store a newly created thword in storage.
     *
     * @param ThwordRequest $thwordRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ThwordRequest  $thwordRequest)
    {
/*
        // is this a duplicate thword?
        $this->response['duplicates'] = [];
        $duplicateThwords = Thword::findDuplicates($thwordRequest);

        if ($duplicateThwords->count() > 0) {
            $this->response['duplicates'] = $duplicateThwords;
            return response()->json($this->response, 200);
        }
*/
        $thwordRequest->validate($thwordRequest->rules(), $thwordRequest->messages());

        try {
            if ($thword = Thword::create($thwordRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $thword;
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Thword successfully created.';
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
     * Activate the specified term.
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

    protected function postInsertProcessing($terms)
    {
        try {
            $builder = DB::table('terms')
                ->select(['term'])
                ->whereIn('term', $terms)
                ->orWhereIn('en_uk, $terms');
            foreach ($builder->get() as $row) {
                if (false !== $key = array_search($row->term, $terms)) {
                    unset($terms[$key]);
                }
            }

            $terms = array_values($terms);
print_r($terms);

        } catch (\Exception $e) {
            // ignore the exception because it is not critical
            return false;
        }

        return true;
    }
}
