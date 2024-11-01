<?php

namespace App\Traits;

use App\Tools\WhereTool;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

trait PageListTrait
{
    /**
     * 获取分页列表
     */
    public function pageList(Builder $model, array $page, array $where = []): LengthAwarePaginator
    {
        $where = WhereTool::buildWhere($where);

        return $model->where($where)->paginate($page['limit']);
    }
}
