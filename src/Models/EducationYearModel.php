<?php
/*
 * Copyright (c) 2023. Dilshod Tursimatov
 * Github: @dasturchiuz
 * Twitter: @dasturchiuz
 *
 */

namespace Dasturchiuz\Hemisapi\Models;

class EducationYearModel
{
    public string $code;
    public string $name;
    public bool $current;

    public static function fromJson($json){
        $jsonObj = json_decode($json);
        $model = new self();
        $model->code = $jsonObj->code;
        $model->name = $jsonObj->name;
        $model->current = $jsonObj->current;
        return $model;
    }

    public static function fromMap($map){
        $model = new self();
        $model->code = $map->code;
        $model->name = $map->name;
        $model->current = $map->current;
        return $model;
    }
}
