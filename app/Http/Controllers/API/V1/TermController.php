<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TermRequest;
use App\Models\Language;
use App\Models\Term;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TermController extends BaseController
{
    /**
     * Return a listing of Terms.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return Term::orderBy('id', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Term.
     *
     * @param  Term $term
     * @return JsonResponse
     */
    public function show(Term $term)
    {
        return $term;
    }

    /**
     * Store a newly created Term in storage.
     *
     * @param  TermRequest $termRequest
     * @return JsonResponse
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

                $wordsByLanguageCode = [];
                foreach (Language::select(['code', 'collins'])->whereNotNull('collins')->get() as $language) {
                    if (!array_key_exists($language->code, $wordsByLanguageCode)) {
                        $wordsByLanguageCode[$language->code] = [];
                    }
                    $field = 'collins_' . str_replace('-', '_', $language->collins);
                    $value = trim($term->{$field});
                    if (!empty($value)) {
                        foreach (explode(' ', $value) as $word) {
                            if (!in_array($word, $wordsByLanguageCode[$language->code])) {
                                $wordsByLanguageCode[$language->code][] = $word;
                            }
                        }
                    }
                }
$this->response['wordsByLanguageCode'] = $wordsByLanguageCode;
$this->response['inserts'] = [];
                foreach ($wordsByLanguageCode as $languageCode=>$words) {

                    $langModel = 'App\Models\Translations\\' . ucfirst($languageCode);

                    foreach ($words as $word) {
$this->response['inserts'][] = ['langModel' => 'App\Models\Translations\\' . ucfirst($languageCode), 'word' => $word];
                        // insert a new translation
                        $translation = $langModel::create([
                            'word' => $word
                        ]);

                        $term->{$languageCode}()->save($translation);
                    }
                }
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
     * @return JsonResponse
     */
    public function update(TermRequest $termRequest, Term $term)
    {
        // is this a duplicate Term?
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

                $input= $termRequest->all();
                foreach (Language::select('code')->where('active', 1)->get()->pluck('code') as $languageCode) {
                    if (array_key_exists($languageCode, $input)) {
                        foreach ($input[$languageCode] as $translationInput) {

                            $langModel = 'App\Models\Translations\\' . ucfirst($languageCode);

                            if (array_key_exists('id', $translationInput) && !empty($translationInput['id'])) {

                                // update an existing translation
                                if (!$translation = $langModel::find($translationInput['id'])) {
                                    if (!empty($translationInput['word'])) {

                                        // insert a new translation
                                        $translation = $langModel::create([
                                            'id' =>   $translationInput['id'],
                                            'word' => $translationInput['word']
                                        ]);
                                        $term->{$languageCode}()->save($translation);
                                    }
                                } else {

                                    if (empty($translationInput['word'])) {
                                        // delete the translation
                                        $translation->delete();

                                    } elseif ($translationInput['word'] != $translation->word) {
                                        // update the translation
                                        $translation->word = $translationInput['word'];
                                        $term->{$languageCode}()->save($translation);
                                    }
                                }

                            } elseif (!empty($translationInput['word'])) {

                                // insert a new translation
                                $translation = $langModel::create([
                                    'word' => $translationInput['word']
                                ]);
                                $term->{$languageCode}()->save($translation);
                            }
                        }
                    }
                }


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
     * Activate the specified Term.
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

    /**
     * Return search results.
     *
     * @param  Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        $errors = [];

        $validFields = (new Term)->getFillableFields();
        $page        = 1;
        $perPage     = $this->paginationValue;
        $orderBy     = [
            "field" => "term",
            "dir"   => "asc"
        ];

        $builder = DB::table('terms');

        foreach ($request->all() as $param=>$value) {

            // dashes in language abbreviations need to be converted to underscores to use as fields
            $param = str_replace('-', '_', $param);

            if (!empty ($value)) {
                if ($param === 'field') {

                    // search fields
                    foreach ($value as $searchField) {

                        if (!empty($searchField['name']) && !empty($searchField['value'])) {

                            if (0 === strpos($searchField['name'], 'LANGUAGE_collins_')) {

                                // language specified as a search field
                                $language = substr($searchField['name'], 5);

                                $builder->where($language,  'LIKE', $searchField['value']);


                            } elseif (!in_array($searchField['name'], $validFields)) {

                                $errors[] = "Invalid search field \"{$searchField['name']}\" specified.";

                            } else {

                                if (false !== strpos($searchField['value'], '%')) {
                                    $builder->where($searchField['name'], 'LIKE', $searchField['value']);
                                    if ($searchField['name'] === 'term') {
                                        $builder->orWhere('en_uk', 'LIKE', $searchField['value']);
                                        $builder->orWhere('en_us', 'LIKE', $searchField['value']);
                                    }
                                } else {
                                    $builder->where($searchField['name'], $searchField['value']);
                                    if ($searchField['name'] === 'term') {
                                        $builder->orWhere('en_uk', $searchField['value']);
                                        $builder->orWhere('en_us', $searchField['value']);
                                    }
                                }
                            }
                        }
                    }

                } elseif ($param == 'sort') {

                    $field = str_replace("-", "_", $value['field']);
                    if (!empty($value['field'])) {
                        $orderBy['field'] = $field;
                    }
                    if (!empty($value['dir'])) {
                        $orderBy['dir'] = $value['dir'];
                    }

                    if (in_array($field, $validFields)) {
                        $builder->where($field, '<>', '');
                        $builder->whereNotNull($field);
                    }

                } elseif ($param === 'dfield') {

                    // display fields

                } elseif ($param === 'page') {

                    $page = intval($value);

                } elseif ($param === 'limit') {

                    $perPage = intval($value);

                } else {

                    // search parameter
                    if (in_array($param, ['pos_id', 'category_id', 'grade_id']) && ($value == 1)) {
                        // for these a value of "1" means nothing has been selected
                    } else {
                        if (!in_array($param, $validFields)) {
                            $errors[] = "Invalid parameter \"{$param}\" specified.";
                        } elseif (!empty($value)) {
                            $builder->where($param, $value);
                        }
                    }
                }
            }
        }

        if (!empty($errors)) {
            $this->response['message'] = 'Error occurred while performing search.';
            $this->response['errors'] = $errors;
            return response()->json($this->response, 200);
        } else {
            try {
                $response = $builder->orderBy($orderBy['field'], $orderBy['dir'])->paginate($perPage, ['*'], 'page', $page);
                return $response;
            } catch (\Exception $e) {
                $this->response['message'] = 'Error occurred while performing search.';
                $this->response['errors'][] = $e->getMessage();
                return response()->json($this->response, 200);
            }
        }

        return Term::orderBy($orderBy["field"], $orderBy["dir"])->paginate($perPage, ['*'], 'page', $page);
    }
}
