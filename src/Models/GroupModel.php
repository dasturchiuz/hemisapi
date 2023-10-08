<?php
/*
 * Copyright (c) 2023. Dilshod Tursimatov
 * Github: @dasturchiuz
 * Twitter: @dasturchiuz
 *
 */

namespace Dasturchiuz\Hemisapi\Models;

class GroupModel
{
    public int $id;
    public string $name;


    public static function fromJson($json){
        $jsonObj = json_decode($json);
        $model = new self();
        $model->id = $jsonObj->id;
        $model->name = $jsonObj->name;
        return $model;
    }

    public static function fromMap($map){
        $model = new self();
        $model->id = $map->id;
        $model->name = $map->name;
        return $model;
    }
}
