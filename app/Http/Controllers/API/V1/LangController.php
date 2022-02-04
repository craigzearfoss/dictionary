<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\LangRequest;
use App\Models\Lang;
use Illuminate\Http\Request;

class LangController extends \App\Http\Controllers\API\BaseController
{
    public function index()
    {
        return Lang::orderBy('short', 'asc')->paginate($this->paginationValue);
    }

    public function show(Lang $lang)
    {
        return $lang;
    }

    public function store(LangRequest $langRequest)
    {
        $langRequest->validate($langRequest->rules(), $langRequest->messages());

        try {
            if ($lang = Lang::create($langRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $lang;
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }

        $this->response['message'] = 'Language successfully saved.';
        return response()->json($this->response, 201);
    }

    public function update(LangRequest $langRequest, Lang $lang)
    {
        try {
            if ($lang->update($langRequest->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $lang;
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

    public function delete(Lang $lang)
    {
        $lang->delete();

        return response()->json(null, 204);
    }
}
