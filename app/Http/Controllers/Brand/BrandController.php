<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'name_en' => 'string',
            'name_cn' => 'string',
        ]);

        $params = [];
        foreach ($request->only('name_en', 'name_cn') as $key => $val) {
            $params[$key] = $val;
        }

        $response = Brand::where($params)->select('name_en', 'name_cn')->get();

        $response = $this->letterSort($response, 'name_en');

        return response()->json($this->response($response));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function detail(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|int',
        ]);

        $params = $request->only('id');

        $data = Brand::where(['id' => $params['id']])->first();

        if (empty($data)) {
            $response = new \stdClass();
        } else {
            $response = [
                'id'        => $data->id,
                'title'     => $data->title,
                'name_en'   => $data->name_en,
                'name_cn'   => $data->name_cn,
                'founder'   => $data->founder,
                'since'     => $data->since,
                'icountryd' => $data->country,
                'industry'  => $data->industry,
            ];

            $list = ['founder_bg', 'brand_bg', 'brand_culture', 'brand_identify'];
            foreach ($list as $field) {
                if (!empty($data->$field)) {
                    $infoList[] = [
                        'mean'  => Brand::FIELDS_EXPLAIN[$field],
                        'field' => $field,
                        'value' => $data->$field,
                    ];
                }
            }
            $response['info_list'] = $infoList;

        }

        return response()->json($this->response($response));
    }

    public function letterSort($list, $field)
    {
        $ordered = [];
        foreach ($list as $item) {
            if (!empty($item[$field])) {
                $letter = strtoupper(substr($item[$field], 0, 1));
                $ord    = ord($letter);
                if ($ord >= 65 && $ord <= 90) {
                    if (!in_array($letter, $ordered)) {
                        $ordered[$letter]['letter'] = $letter;
                    }
                    $ordered[$letter]['list'][] = $item;
                }
            }
        }
        sort($ordered);
        return array_values($ordered);
    }


}