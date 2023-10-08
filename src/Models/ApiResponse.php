<?php
/*
 * Copyright (c) 2023. Dilshod Tursimatov
 * Github: @dasturchiuz
 * Twitter: @dasturchiuz
 *
 */

namespace Dasturchiuz\Hemisapi\Models;

use Closure;

class ApiResponse
{
    public bool $success;
    public ?string $error;
    public int $code;
    public  $data;
    public  Pagination $pagination;

    /**
     * @param $data
     * @param Closure $closure
     */
    public function __construct($data, Closure $closure)
    {
        $this->success = $data->success;
        $this->error = $data->error;
        $this->code = $data->code;
        $this->pagination = $data->data->pagination ? Pagination::fromMap($data->data->pagination) : null;
        $this->data =  $closure($data->data);
    }
}
