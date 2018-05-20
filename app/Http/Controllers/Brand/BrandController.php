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
     * @throws \Illuminate\Validation\ValidationException
     */
    public function show(Request $request)
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
            foreach ($list as $val) {
                $infoList[] = [
                    'field' => $val,
                    'value' => $data->$val,
                ];
            }
            $response['info_list'] = $infoList;

        }

        return response()->json($this->response($response));
    }
}