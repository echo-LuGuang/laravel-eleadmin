<?php

namespace App\Http\Controllers\Admin;

use Spatie\RouteAttributes\Attributes\Get;

class IndexController extends AdminBaseController
{
    #[Get('/')]
    public function index()
    {
        return $this->success();
    }
}
