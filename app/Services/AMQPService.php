<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class AMQPService
{
    private $connection;
    private $channel;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->connection = new AMQPStreamConnection('192.168.0.63', 5672, 'guest', 'guest');
        $this->channel = $this->connection->channel();
    }

    public function publishMessage($message)
    {
        $properties = [
            'delivery_mode' => 2, // Устанавливаем режим доставки в persistent (2)
        ];

        $msg = new AMQPMessage($message, $properties);
        $this->channel->exchange_declare('notification_user', 'direct', false, true, false);
        $this->channel->basic_publish($msg, 'notification_user', 'user_key');
    }

    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }
}
