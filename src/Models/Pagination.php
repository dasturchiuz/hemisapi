<?php
/*
 * Copyright (c) 2023. Dilshod Tursimatov
 * Github: @dasturchiuz
 * Twitter: @dasturchiuz
 *
 */

namespace Dasturchiuz\Hemisapi\Models;

class Pagination
{
    public int $totalCount;
    public int $pageSize;
    public int $pageCount;
    public int $page;

    public static function fromMap($map){
        $model = new self();
        $model->totalCount = $map->totalCount;
        $model->pageSize = $map->pageSize;
        $model->pageCount = $map->pageCount;
        $model->page = $map->page;
        return $model;
    }
}
