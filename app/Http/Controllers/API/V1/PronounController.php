<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\PronounRequest;
use App\Models\Language;
use App\Models\Pronoun;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PronounController extends BaseController
{
    /**
     * Return a listing of Pronouns.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return Pronoun::orderBy('id', 'asc')->get();
    }

    /**
     * Return the specified Pronoun.
     *
     * @param  Pronoun $pronoun
     * @return JsonResponse
     */
    public function show(Pronoun $pronoun)
    {
        return $pronoun;
    }

    /**
     * Show the form for editing the specified Translation.
     *
     * @param string $langCode
     * @return \Illuminate\Http\Response
     */
    public function list($langCode)
    {
        $language = Language::getLanguageByCode($langCode);

        return Pronoun::where('language_id', $language->id)->get()->toArray();
    }
}
