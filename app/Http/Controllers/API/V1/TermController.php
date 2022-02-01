<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TermRequest;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends \App\Http\Controllers\API\BaseController
{
    protected $validationRules = [
        'term'       => 'required|max:255',
        'definition' => 'max:255',
        'sentence'   => 'max:255',
        'en_us'      => 'max:255',
        'en_uk'      => 'max:255',
        'ar'         => 'max:255',
        'cs'         => 'max:255',
        'da'         => 'max:255',
        'de'         => 'max:255',
        'el'         => 'max:255',
        'es_es'      => 'max:255',
        'es_la'      => 'max:255',
        'fi'         => 'max:255',
        'fr'         => 'max:255',
        'hr'         => 'max:255',
        'it'         => 'max:255',
        'ja'         => 'max:255',
        'ko'         => 'max:255',
        'nl'         => 'max:255',
        'no'         => 'max:255',
        'pl'         => 'max:255',
        'pt_br'      => 'max:255',
        'pt_pt'      => 'max:255',
        'ro'         => 'max:255',
        'ru'         => 'max:255',
        'sv'         => 'max:255',
        'th'         => 'max:255',
        'tr'         => 'max:255',
        'uk'         => 'max:255',
        'vi'         => 'max:255',
        'zh'         => 'max:255'
    ];

    protected $validationMessages = [
        'abbrev.required'   => 'Abbreviation must be specified.'
    ];

    public function index()
    {
        return Term::orderBy('asc', 'asc')->paginate($this->paginationValue);
    }

    public function show(Term $term)
    {
        return $term;
    }

    public function store(TermRequest  $termRequest)
    {
        $termRequest->validate($this->validationRules, $this->validationMessages);

        try {
            if ($term = Term::create($termRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $term;
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Term successfully saved.';
        return response()->json($this->response, 201);
    }

    public function update(TermRequest $termRequest, Term $term)
    {
        try {
            if ($term->update($termRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $term;
            } else {
                $this->response['messsage'] = 'WTF';
                return response()->json($this->response, 500);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Language successfully updated.';
        return response()->json($this->response, 500);
    }

    public function delete(Term $term)
    {
        $term->delete();

        return response()->json(null, 204);
    }
}
