<?php
/*
 * Copyright (c) 2023. Dilshod Tursimatov
 * Github: @dasturchiuz
 * Twitter: @dasturchiuz
 *
 */

namespace Dasturchiuz\Hemisapi\Models;

class DeportmentModel
{
    public int $id;
    public string $name;
    public string $code;
    public ?int $parent;
    public ClassifierModel $structureType;

    public static function fromJson($json){
        $jsonObj = json_decode($json);
        $model = new self();
        $model->id = $jsonObj->id;
        $model->code = $jsonObj->code;
        $model->parent = $jsonObj->parent;
        $model->structureType =ClassifierModel::fromJson(json_encode($jsonObj->structureType)) ;
        return $model;
    }
    public static function fromMap($map){
        $model = new self();
        $model->id = $map->id;
        $model->name = $map->name;
        $model->code = $map->code;
        $model->parent = $map->parent;
        $model->structureType =ClassifierModel::fromMap($map->structureType) ;
        return $model;
    }
}
