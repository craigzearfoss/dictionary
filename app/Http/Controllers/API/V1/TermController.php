<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TermRequest;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends \App\Http\Controllers\API\BaseController
{
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
