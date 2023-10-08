<?php
/*
 * Copyright (c) 2023. Dilshod Tursimatov
 * Github: @dasturchiuz
 * Twitter: @dasturchiuz
 *
 */

namespace Dasturchiuz\Hemisapi\Models;

class MeModel
{
    public ?bool $success;
    public ?string $error;
    public int $code;
    public ?StudentModel $data;

    public static function fromJson($json){
        $jsonObj = json_decode($json);
        $model = new MeModel();
        $model->success = $jsonObj->success;
        $model->error = $jsonObj->error;
        $model->code = $jsonObj->code;
        if($jsonObj->success==true){
            $model->data = StudentModel::fromMap($jsonObj->data);
        }else{
            $model->data = null;
        }
        return $model;
    }
}
