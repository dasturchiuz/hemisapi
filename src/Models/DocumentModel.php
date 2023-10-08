<?php
/*
 * Copyright (c) 2023. Dilshod Tursimatov
 * Github: @dasturchiuz
 * Twitter: @dasturchiuz
 *
 */

namespace Dasturchiuz\Hemisapi\Models;

class DocumentModel
{
    public int $id;
    public ?string $name;
    public ?string $type;
    public ?string  $file;
    public ?array $attributes;

    public static function fromMap($map){
        $model = new self();
        $model->id = $map->id;
        $model->name = $map->name;
        $model->type = $map->type;
        $model->file = $map->file;
        foreach($map->attributes as $mapAttr){
            $model->attributes[] = AttributeModel::fromMap($mapAttr);
        }
        return $model;
    }
}
