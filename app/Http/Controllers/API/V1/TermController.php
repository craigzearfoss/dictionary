<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TermRequest;
use App\Models\Language;
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
     * @return \Illuminate\Http\JsonResponse
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
