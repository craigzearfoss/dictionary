<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\ThwordRequest;
use App\Models\Thword;
use App\Models\TileSet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThwordController extends BaseController
{
    /**
     * Return a listing of Thwords.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return Thword::orderBy('id', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Thword.
     *
     * @param  Thword $thword
     * @return JsonResponse
     */
    public function show(Thword $thword)
    {
        $thword->terms = array_merge([$thword->subject], explode('|', $thword->synonyms));
        unset($thword->synonyms);
        unset($thword->antonyms);

        // add the game tiles to the Thword object
        $thword->tiles = (new TileSet())->getLanguageGameTiles($thword->language_id);

        return $thword;
    }

    /**
     * Return a random Thword.
     *
     * @return JsonResponse
     */
    public function random()
    {
        $thwordCnt = DB::table('thwords')->count();
        $index = mt_rand(1, $thwordCnt);
        while (!$thword = DB::table('thwords')->find($index)) {
            $index = mt_rand(1, $thwordCnt);
        }

        $thword->terms = array_merge([$thword->subject], explode('|', $thword->synonyms));
        unset($thword->synonyms);
        unset($thword->antonyms);

        // add the game tiles to the Thword object
        $thword->tiles = (new TileSet())->getLanguageGameTiles($thword->language_id);

        return $thword;
    }

    /**
     * Return the specified "Anti-Thword".
     *
     * @param  Thword $thword
     * @return JsonResponse
     */
    public function showAntiThword(Thword $thword)
    {
        $thword->terms = explode('|', $thword->antonyms);
        unset($thword->synonyms);
        unset($thword->antonyms);

        // add the game tiles to the Thword object
        $thword->tiles = (new TileSet())->getLanguageGameTiles($thword->language_id);

        return $thword;
    }

    /**
     * Return a random "Anti-Thword".
     *
     * @return JsonResponse
     */
    public function randomAntiThword()
    {
        $thwordCnt = DB::table('thwords')->count();
        $index = mt_rand(1, $thwordCnt);
        while (!$thword = DB::table('thwords')->find($index)) {
            $index = mt_rand(1, $thwordCnt);
        }

        $thword->terms = explode('|', $thword->antonyms);
        unset($thword->synonyms);
        unset($thword->antonyms);

        // add the game tiles to the Thword object
        $thword->tiles = (new TileSet())->getLanguageGameTiles($thword->language_id);

        return $thword;
    }

    /**
     * Store a newly created Thword in storage.
     *
     * @param  ThwordRequest $thwordRequest
     * @return JsonResponse
     */
    public function store(ThwordRequest  $thwordRequest)
    {
/*
        // is this a duplicate Thword?
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
     * Update the specified Thword in storage.
     *
     * @param  TermRequest $termRequest
     * @param  Term $term
     * @return JsonResponse
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
     * Remove the specified Thword from storage.
     *
     * @param  Term $term
     * @return JsonResponse
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
     * @param  Request $request
     * @param  Term $term
     * @return JsonResponse
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
