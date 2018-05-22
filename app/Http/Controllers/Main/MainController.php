<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    /**
     * 获取主页
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
//    public function index(Request $request)
//    {
//        $rule = [
//            'title'  => 'string',
//            'author' => 'string',
//        ];
//        $this->validate($request, $rule);
//
//        $params = [];
//        foreach ($request->only(array_keys($rule)) as $key => $val) {
//            $params[$key] = $val;
//        }
//
//        $response = Article::where(function ($query) use ($params) {
//            foreach ($params as $field => $value) {
//                $query->where($field, 'like', '%' . $value . '%');
//            }
//        })->orderBy('ctime', 'desc')->get();
//
//        foreach ($response as &$item) {
//            $item['is_like'] = MapUser::where([
//                'user_id' => 1,
//                'attr_id' => $item['id'],
//                'type'    => MapUser::TYPE_ARTICLE,
//                'status'  => MapUser::STATUS_NORMAL,
//            ])->count();
//        }
//
//        return response()->json($this->response($response));
//    }

    /**
     * 创建主页
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
//    public function create(Request $request)
//    {
//        $rules = [
//            'title'   => 'required|string',
//            'image'   => 'string',
//            'author'  => 'string',
//            'content' => 'string',
//        ];
//
//        $this->validate($request, $rules);
//
//        $params = [];
//        foreach ($request->only(array_keys($rules)) as $key => $val) {
//            $params[$key] = $val ?? '';
//        }
//
//        $response = Article::create($params);
//
//        return response()->json($this->response($response));
//
//    }
}