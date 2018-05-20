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

        $data = Brand::where(['id' => 1])->first();

        return response()->json($this->response($data));
    }
}