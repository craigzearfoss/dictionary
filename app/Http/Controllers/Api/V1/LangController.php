<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LangRequest;
use App\Models\Lang;
use Illuminate\Http\Request;

class LangController extends \App\Http\Controllers\Api\BaseController
{
    protected $validationRules = [
        'abbrev'         => 'required|unique|min:2|max:10',
        'full'           => 'required|max:100',
        'short'          => 'required|max:50',
        'code'           => 'required|min:2|max:10',
        'name'           => 'required|max:100',
        'directionality' => 'required|in:ltr,rtl',
        'local'          => 'required|max:100',
        'wiki'           => 'nullable|max:100'
    ];

    protected $validationMessages = [
        'abbrev.required'   => 'Abbreviation must be specified.'
    ];

    public function index()
    {
        //return Lang::latest()->paginate(5);
        return Lang::orderBy('short', 'asc')->paginate($this->pagination_value);
    }

    public function show(Lang $lang)
    {
        return $lang;
    }

    public function store(LangRequest  $request)
    {
        $request->validate($this->validationRules, $this->validationMessages);

        try {
            if ($lang = Lang::create($request->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $lang;
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            $this->ajaxResponse(500);
        }

        return response()->json($this->response, 201);
        //$this->ajaxResponse(201);
    }

    public function update(Request $request, Lang $lang)
    {
        //$lang->update($request->all());
        //return response()->json($lang, 200);

        try {
            if ($lang->update($request->all())) {
                $this->response['success'] = 1;
                $this->response['data'] = $lang;
            } else {
                $this->response('WTF');
                $this->ajaxResponse(500);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage();
            $this->ajaxResponse(500);
        }

        $this->ajaxResponse(201);
    }

    public function delete(Lang $lang)
    {
        $lang->delete();

        return response()->json(null, 204);
    }
}
