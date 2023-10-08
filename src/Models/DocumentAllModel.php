<?php
/*
 * Copyright (c) 2023. Dilshod Tursimatov
 * Github: @dasturchiuz
 * Twitter: @dasturchiuz
 *
 */

namespace Dasturchiuz\Hemisapi\Models;

class DocumentAllModel
{
    public ?bool $success;
    public ?string $error;
    public int $code;
    public array $data;

    public static function fromJson($json){
        $jsonObj = json_decode($json);
        $model = new self();
        $model->success = $jsonObj->success;
        $model->error = $jsonObj->error;
        $model->code = $jsonObj->code;
        if($jsonObj->success==true){
            foreach ($jsonObj->data as $item){
                $model->data[] = DocumentModel::fromMap($item);
            }
        }else{
            $model->data = null;
        }
        return $model;
    }
}
