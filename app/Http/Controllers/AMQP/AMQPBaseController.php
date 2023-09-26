<?php

namespace App\Http\Controllers\AMQP;

use App\Services\AMQPService;
use App\Services\Test\Service;

class AMQPBaseController extends \App\Http\Controllers\Controller
{
    protected $amqpService;
    public function __construct(AMQPService $amqpService)
    {
        $this->amqpService = $amqpService;
    }
}
