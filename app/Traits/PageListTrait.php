<?php

namespace App\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

trait PageListTrait
{
    /**
     * 获取分页列表
     */
    public function pageList(Builder $model, array $page, array $where = []): LengthAwarePaginator
    {
        $where = array_filter($where, fn ($item) => $item !== '' && $item !== null);

        return $model->where($where)->paginate($page['limit']);
    }
}
