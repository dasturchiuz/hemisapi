<?php
/*
 * Copyright (c) 2023. Dilshod Tursimatov
 * Github: @dasturchiuz
 * Twitter: @dasturchiuz
 *
 */

namespace Dasturchiuz\Hemisapi\Models;

class SemesterModel
{
    public int $id;
    public string $code;
    public string $name;
    public bool $current;
    public EducationYearModel $education_year;

    public static function fromJson($json){
        $jsonObj = json_decode($json);
        $model = new self();
        $model->id = $jsonObj->id;
        $model->code = $jsonObj->code;
        $model->name = $jsonObj->name;
        $model->current = $jsonObj->current;
        $model->education_year =EducationYearModel::fromJson($jsonObj->education_year) ;
        return $model;
    }

    public static function fromMap($map){
        $model = new self();
        $model->id = $map->id;
        $model->code = $map->code;
        $model->name = $map->name;
        $model->current = $map->current;
        $model->education_year =EducationYearModel::fromMap($map->education_year) ;
        return $model;
    }
}
