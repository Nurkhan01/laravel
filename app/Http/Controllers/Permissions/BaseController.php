<?php

namespace App\Http\Controllers\Permissions;


use App\Services\Permissions\Service;

class BaseController extends \App\Http\Controllers\Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
