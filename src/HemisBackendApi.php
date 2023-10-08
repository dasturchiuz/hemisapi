<?php
/*
 * Copyright (c) 2023. Dilshod Tursimatov
 * Github: @dasturchiuz
 * Twitter: @dasturchiuz
 *
 */
namespace Dasturchiuz\Hemisapi;

use Dasturchiuz\Hemisapi\Models\ApiResponse;
use Dasturchiuz\Hemisapi\Models\ClassifierModel;
use Dasturchiuz\Hemisapi\Models\DeportmentModel;
use Dasturchiuz\Hemisapi\Models\Pagination;
use GuzzleHttp\Exception\GuzzleException;
use http\Client\Response;

class HemisBackendApi{

    private $API_KEY;
    private $HEMISAPI_URL;
    private $client;

    protected static self|null $instance = null;


    public static function getInstance(): static
    {
        if (static::$instance === null) {
            static::$instance = new static;
        }

        return static::$instance;
    }


    public function __construct()
    {
        $this->API_KEY = env("HEMISAPI_KEY", "");
        $this->HEMISAPI_URL = env("HEMISAPI_URL", "");
        $client = new \GuzzleHttp\Client([
            'base_uri'=>$this->HEMISAPI_URL,
            'connect_timeout' => 3.14,
            'timeout' => 3.14,
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
//                'User-Agent' => $_SERVER['HTTP_USER_AGENT'],
                'Authorization' => 'Bearer ' . $this->API_KEY
            ],
        ]);
        $this->client = $client;
    }

    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     */
    private function __clone()
    {
    }

    /**
     * prevent from being unserialized (which would create a second instance of it)
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }


    /**
     * @param $uri
     * @param $params
     * @param $others
     * @return mixed
     */
    private function getReqest($uri, $params=[], $others=[]) : \GuzzleHttp\Psr7\Response
    {
        $options=[];
        if(count($params)>0){
            $options['query'] =  $params;
        }
        $response = $this->client->get($uri,$options);
        return $response;
    }

    public  function classifierList($page=1, $limit=10)
    {
        $url = "/rest/v1/data/classifier-list";
        try {
            $response =  $this->getReqest($url, ['page'=>$page, 'limit'=>$limit]);
            if($response->getStatusCode()==200){
                $resBody = $response->getBody();
                $dataClass = $resBody->getContents();
                return new ApiResponse(json_decode($dataClass), function ($data){
                    if($data){
                        return $data->items;
                    }
                    return null;
                });
            }else{
                return false;
            }
        }catch (GuzzleException $exception)
        {
            return $exception;
        }
    }

    public  function getDeportmentList($page=1, $limit=10)
    {
        $url = "/rest/v1/data/department-list";
        try {
            $response =  $this->getReqest($url, ['page'=>$page, 'limit'=>$limit]);

            if($response->getStatusCode()==200){
                $resBody = $response->getBody();
                $dataClass = $resBody->getContents();
                return new ApiResponse(json_decode($dataClass), function ($data){
                    if($data){
                        $dataResult = [];
                        foreach ($data->items as $item){
                            $dataResult[] = DeportmentModel::fromMap($item);
                        }
                        return $dataResult;
                    }
                    return null;
                });
            }else{
                $resBody = $response->getBody();
                $dataClass = $resBody->getContents();
                $res = json_decode($dataClass);
                return $res->error;
            }
        }catch (\Exception $exception)
        {
            return $exception;
        }
    }

    public  function getEmployee($passport_number, $passport_pin, $type="employee", $employee_form=11)
    {
        $url = "/rest/v1/data/employee-list";
        try {
            $response =  $this->getReqest($url, ['passport_number'=>$passport_number, 'passport_pin'=>$passport_pin, 'type'=>$type, '_employment_form'=>$employee_form]);
            if($response->getStatusCode()==200){
                $resBody = $response->getBody();
                $dataClass = $resBody->getContents();
                return new ApiResponse(json_decode($dataClass), function ($data){
                    if($data){
                        return count($data->items) > 0 ? $data->items[0] : null;
                    }
                    return null;
                });
            }else{
                $resBody = $response->getBody();
                $dataClass = $resBody->getContents();
                $res = json_decode($dataClass);
                return $res->error;
            }
        }catch (\Exception $exception)
        {
            return $exception;
        }
    }
}
