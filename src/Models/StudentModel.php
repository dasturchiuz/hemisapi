<?php
/*
 * Copyright (c) 2023. Dilshod Tursimatov
 * Github: @dasturchiuz
 * Twitter: @dasturchiuz
 *
 */

namespace Dasturchiuz\Hemisapi\Models;

class StudentModel
{
    public string $first_name;
    public string $second_name;
    public string $full_name;
    public string $short_name;
    public string $university;
    public ?string $student_id_number;
    public string $image;
    public int $birth_date;
    public ?string $phone;
    public ?string $email;
    public GroupModel $group;
    public DeportmentModel $faculty;
    public ClassifierModel $educationLang;
    public SemesterModel $semester;
    public ClassifierModel $specialty;
    public ClassifierModel $level;
    public ClassifierModel $educationForm;
    public ClassifierModel $educationType;
    public ClassifierModel $studentStatus;

    public static function fromJson($json){
        $jsonObj = json_decode($json);
        $model = new self();
        $model->first_name = $jsonObj->first_name;
        $model->second_name = $jsonObj->second_name;
        $model->full_name = $jsonObj->full_name;
        $model->short_name = $jsonObj->short_name;
        $model->university = $jsonObj->university;
        $model->student_id_number = $jsonObj->student_id_number;
        $model->image = $jsonObj->image;
        $model->birth_date = $jsonObj->birth_date;
        $model->phone = $jsonObj->phone;
        $model->email = $jsonObj->email;
        $model->group = GroupModel::fromJson($jsonObj->group);
        $model->faculty = DeportmentModel::fromJson($jsonObj->faculty);
        $model->educationLang = ClassifierModel::fromJson($jsonObj->educationLang);
        $model->semester = SemesterModel::fromJson($jsonObj->semester);
        $model->specialty = ClassifierModel::fromJson($jsonObj->specialty);
        $model->level = ClassifierModel::fromJson($jsonObj->level);
        $model->educationForm = ClassifierModel::fromJson($jsonObj->educationForm);
        $model->educationType = ClassifierModel::fromJson($jsonObj->educationType);
        $model->studentStatus = ClassifierModel::fromJson($jsonObj->studentStatus);
        return $model;
    }

    public static function fromMap($map){

        $model = new self();
        $model->first_name = $map->first_name;
        $model->second_name = $map->second_name;
        $model->full_name = $map->full_name;
        $model->short_name = $map->short_name;
        $model->university = $map->university;
        $model->student_id_number = $map->student_id_number;
        $model->image = $map->image;
        $model->birth_date = $map->birth_date;
        $model->phone = $map->phone;
        $model->email = $map->email;
        $model->group = GroupModel::fromMap($map->group);
        $model->faculty = DeportmentModel::fromMap($map->faculty);
        $model->educationLang = ClassifierModel::fromMap($map->educationLang);
        $model->semester = SemesterModel::fromMap($map->semester);
        $model->specialty = ClassifierModel::fromMap($map->specialty);
        $model->level = ClassifierModel::fromMap($map->level);
        $model->educationForm = ClassifierModel::fromMap($map->educationForm);
        $model->educationType = ClassifierModel::fromMap($map->educationType);
        $model->studentStatus = ClassifierModel::fromMap($map->studentStatus);
        return $model;
    }
}
