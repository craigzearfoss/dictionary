<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Term;
use App\Models\Language;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends BaseController
{
    /**
     * Return search results.
     *
     * @param  Request $request
     * @return mixed
     */
    public function index(Request $request)
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
