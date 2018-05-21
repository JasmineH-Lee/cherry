<?php

namespace App\Http\Controllers\User;

use App\Model\MapUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * 获取品牌
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function brand(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|int',
        ]);

        $params = [];
        foreach ($request->only('user_id') as $key => $val) {
            if (!is_null($val)) {
                $params[$key] = $val;
            }
        }

        $params['type']   = MapUser::TYPE_BRAND;
        $params['status'] = MapUser::STATUS_NORMAL;

        $response = MapUser::where($params)
            ->join('t_brand', 'attr_id', '=', 't_brand.id')
            ->get();

        return response()->json($this->response($response));
    }

    /**
     * 获取文章
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function article(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|int',
        ]);

        $params = [];
        foreach ($request->only('user_id') as $key => $val) {
            if (!is_null($val)) {
                $params[$key] = $val;
            }
        }

        $params['type']   = MapUser::TYPE_ARTICLE;
        $params['status'] = MapUser::STATUS_NORMAL;

        $response = MapUser::where($params)
            ->join('t_article', 'attr_id', '=', 't_article.id')
            ->get();

        return response()->json($this->response($response));
    }

    /**
     * 收藏文章
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function likeArticle(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|int',
            'attr_id' => 'required|int',
        ]);

        $params = [];
        foreach ($request->only('user_id', 'attr_id') as $key => $val) {
            if (!is_null($val)) {
                $params[$key] = $val;
            }
        }

        $params['type']   = MapUser::TYPE_ARTICLE;
        $params['status'] = MapUser::STATUS_NORMAL;

        $check = MapUser::where($params)->first();
        if ($check) {
            $response = $check;
        } else {
            $response = MapUser::create($params);
        }

        return response()->json($this->response($response));
    }

    /**
     * 取消文章收藏
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function unlikeArticle(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|int',
            'attr_id' => 'required|int',
        ]);

        $params = [];
        foreach ($request->only('user_id', 'attr_id') as $key => $val) {
            if (!is_null($val)) {
                $params[$key] = $val;
            }
        }

        $params['type']   = MapUser::TYPE_ARTICLE;
        $params['status'] = MapUser::STATUS_NORMAL;

        $check = MapUser::where($params)->first();
        if ($check) {
            $response = MapUser::where($params)->update(['status' => MapUser::STATUS_DELETED]);
        } else {
            $response = 1;
        }

        return response()->json($this->response($response));
    }

    /**
     * 收藏品牌
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function likeBrand(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|int',
            'attr_id' => 'required|int',
        ]);

        $params = [];
        foreach ($request->only('user_id', 'attr_id') as $key => $val) {
            if (!is_null($val)) {
                $params[$key] = $val;
            }
        }

        $params['type']   = MapUser::TYPE_BRAND;
        $params['status'] = MapUser::STATUS_NORMAL;

        $check = MapUser::where($params)->first();
        if ($check) {
            $response = $check;
        } else {
            $response = MapUser::create($params);
        }

        return response()->json($this->response($response));
    }

    /**
     * 取消品牌收藏
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function unlikeBrand(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|int',
            'attr_id' => 'required|int',
        ]);

        $params = [];
        foreach ($request->only('user_id', 'attr_id') as $key => $val) {
            if (!is_null($val)) {
                $params[$key] = $val;
            }
        }

        $params['type']   = MapUser::TYPE_BRAND;
        $params['status'] = MapUser::STATUS_NORMAL;

        $check = MapUser::where($params)->first();
        if ($check) {
            $response = MapUser::where($params)->update(['status' => MapUser::STATUS_DELETED]);
        } else {
            $response = 1;
        }

        return response()->json($this->response($response));
    }
}