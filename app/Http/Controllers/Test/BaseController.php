<?php

namespace App\Http\Controllers\Test;

use App\Services\Test\Service;

class BaseController extends \App\Http\Controllers\Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
