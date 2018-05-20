<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function response($data = [], $code = 0, $message = 'success')
    {
        return compact('code', 'message', 'data');
    }
}
