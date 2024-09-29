<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ApiException;
use Spatie\RouteAttributes\Attributes\Get;

class IndexController extends AdminBaseController
{
    #[Get('/')]
    public function index()
    {
        dump($this->admin());
        return $this->success();
    }
}
