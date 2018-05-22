<?php

namespace App\Http\Controllers\Tag;

use App\Model\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    /**
     * 标签列表
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

        $response = Tag::where($params)->select('name_en', 'name_cn')->get();

        return response()->json($this->response($response));
    }

    /**
     * 创建标签
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'tag_name' => 'required|string',
        ]);

        $params = $request->only('tag_name');

        $response = Tag::create($params);

        return response()->json($this->response($response));
    }


}