<?php
/*
 * Copyright (c) 2023. Dilshod Tursimatov
 * Github: @dasturchiuz
 * Twitter: @dasturchiuz
 *
 */

namespace Dasturchiuz\Hemisapi\Models;

class AttributeModel
{
    public string $label;
    public string $value;

    public static function fromMap($map){
        $model = new self();
        $model->label = $map->label;
        $model->value = $map->value;
        return $model;
    }
}
