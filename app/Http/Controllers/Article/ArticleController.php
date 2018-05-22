<?php

namespace App\Http\Controllers\Article;

use App\Model\Article;
use App\Model\MapUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    /**
     * 文章列表
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request)
    {
        $rule = [
            'title'  => 'string',
            'author' => 'string',
        ];
        $this->validate($request, $rule);

        $params = [];
        foreach ($request->only(array_keys($rule)) as $key => $val) {
            $params[$key] = $val;
        }

        $response = Article::where(function ($query) use ($params) {
            foreach ($params as $field => $value) {
                $query->where($field, 'like', '%' . $value . '%');
            }
        })->orderBy('ctime', 'desc')->get();

        foreach ($response as &$item) {
            $item['is_like'] = MapUser::where([
                'user_id' => 1,
                'attr_id' => $item['id'],
                'type'    => MapUser::TYPE_ARTICLE,
                'status'  => MapUser::STATUS_NORMAL,
            ])->count();
        }

        return response()->json($this->response($response));
    }

    /**
     * 创建文章
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $rules = [
            'title'   => 'required|string',
            'image'   => 'string',
            'author'  => 'string',
            'content' => 'string',
        ];

        $this->validate($request, $rules);

        $params = [];
        foreach ($request->only(array_keys($rules)) as $key => $val) {
            $params[$key] = $val ?? '';
        }

        $response = Article::create($params);

        return response()->json($this->response($response));

    }

    /**
     * 更新文章
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $rules = [
            'id'      => 'required|int|exists:t_article',
            'title'   => 'string',
            'image'   => 'string',
            'author'  => 'string',
            'content' => 'string',
        ];

        $this->validate($request, $rules);

        $params = [];
        foreach ($request->only(array_keys($rules)) as $key => $val) {
            $params[$key] = $val ?? '';
        }

        $id = $params['id'];
        unset($params['id']);

        $response = Article::where(['id' => $id])->update($params);

        return response()->json($this->response($response));
    }


}