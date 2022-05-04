<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\ThwordplayRequest;
use App\Models\Thwordplay;
use App\Models\ThwordplayBase;
use App\Models\TileSet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThwordplayController extends BaseController
{
    /**
     * Return a listing of Thwordplays.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return Thwordplay::orderBy('id', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Thwordplay.
     *
     * @param  Thwordplay $thwordplay
     * @return JsonResponse
     */
    public function show(Thwordplay $thwordplay)
    {
        $thwordplay->terms = explode('|', $thwordplay->synonyms);
        $thwordplay->bonus_questions = $thwordplay->getBonusQuestions();
        $thwordplay->bonus_answers = $thwordplay->getBonusAnswers();
        unset($thwordplay->synonyms);
        unset($thwordplay->antonyms);


        // add the game tiles to the Thwordplay object
        $thwordplay->tiles = (new TileSet())->getLangGameTiles($thwordplay->language_id);

        return $thwordplay;
    }

    /**
     * Return a random Thwordplay.
     *
     * @return JsonResponse
     */
    public function random()
    {
        $thwordplayCnt = DB::table('thwordplays')->count();
        $index = mt_rand(1, $thwordplayCnt);
        while (!$thwordplay = DB::table('thwordplays')->find($index)) {
            $index = mt_rand(1, $thwordplayCnt);
        }

        $thwordplay->terms = explode('|', $thwordplay->synonyms);
        unset($thwordplay->synonyms);
        unset($thwordplay->antonyms);
        unset($thwordplay->bonuses);

        // add the game tiles to the Thword object
        $thwordplay->tiles = (new TileSet())->getLangGameTiles($thwordplay->language_id);

        return $thwordplay;
    }

    /**
     * Store a newly created Thwordplay in storage.
     *
     * @param  ThwordplayRequest $thwordplayRequest
     * @return JsonResponse
     */
    public function store(ThwordplayRequest  $thwordplayRequest)
    {
        $thwordplayRequest->validate($thwordplayRequest->rules(), $thwordplayRequest->messages());

        $data = $thwordplayRequest->all();

        // add bonuses field
        $data['bonuses'] = [
            $data['bonus_question1'] ?? "",
            $data['bonus_question2'] ?? "",
        ];

        // add synonyms and terms field
        $data['synonyms'] = [];
        $data['terms'] = [];
        for ($i=0; $i<count($data['term']); $i++) {

            $data['synonyms'][] = $data['term'][$i];

            $data['terms'][] = [
                'id' => -1,
                'term'   => $data['term'][$i],
                'bonus1' => $data['bonus1'][$i],
                'bonus2' => $data['bonus2'][$i]
            ];
        }

        // remove extraneous fields
        foreach (['term', 'bonus1', 'bonus2', 'bonus_question1', 'bonus_question2'] as $field) {
            if (array_key_exists($field, $data)) {
                unset($data[$field]);
            }
        }

        try {
            if ($thwordplay = Thwordplay::create($data)) {
                $this->response['success'] = 1;
                $this->response['data'] = $thwordplay;
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Thwordplay successfully created.';
        return response()->json($this->response, 201);
    }

    /**
     * Update the specified Thwordplay in storage.
     *
     * @param  ThwordplayRequest $thwordplayRequest
     * @param  Thwordplay $thwordplay
     * @return JsonResponse
     */
    public function update(ThwordplayRequest $thwordplayRequest, Thwordplay $thwordplay)
    {
        $data = $thwordplayRequest->all();
        $data['bonuses'] = [
            $data['bonus1'] ?? "",
            $data['bonus2'] ?? "",
        ];
        foreach (['answers1', 'answers2', 'answers3', 'bonus1', 'bonus2'] as $field) {
            if (array_key_exists($field, $data)) {
                unset($data[$field]);
            }
        }

        try {
            if ($thwordplay->update($data)) {
                $this->response['success'] = 1;
                $this->response['data'] = $thwordplay;
            } else {
                $this->response['message'] = 'WTF';
                return response()->json($this->response, 500);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Thwordplay successfully updated.';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified Thwordplay from storage.
     *
     * @param  Thwordplay $thwordplay
     * @return JsonResponse
     */
    public function delete(Thwordplay $thwordplay)
    {
        try {
            if ($thwordplay->delete()) {
                $this->response['success'] = 1;
                $this->response['message'] = 'Thwordplay successfully deleted.';
            } else {
                $this->response['message'] = 'Thwordplay could not be deleted.';
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
        }

        return response()->json($this->response, 200);
    }

    /**
     * Activate the specified Thwordplay.
     *
     * @param  Request $request
     * @param  Thwordplay $thwordplay
     * @return JsonResponse
     */
    public function activate(\Illuminate\Http\Request $request, Thwordplay $thwordplay)
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
                $thwordplay->active = $active;
                if ($thwordplay->save()) {
                    $this->response['success'] = 1;
                    $this->response['message'] = 'Thwordplay successfully ' . ($active ? 'active' : 'inactivated') . '.';
                } else {
                    $this->response['message'] = 'Thwordplay could not be ' . ($active ? 'active' : 'inactivated') . '.';
                }
            } catch (\Exception $e) {
                $this->response['message'] = $e->getMessage();
            }
        }

        return response()->json($this->response, 200);
    }

    /**
     * Return a listing of ThwordplayBases.
     *
     * @return JsonResponse
     */
    public function bases()
    {
        return ThwordplayBase::orderBy('id', 'asc')->paginate($this->paginationValue);
    }
}
