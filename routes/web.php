<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return App\Tools\JsonTool::success();
});
