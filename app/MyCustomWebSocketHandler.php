<?php


namespace App;

use App\Providers\MyCustomAppProvider;
use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class MyCustomWebSocketHandler implements MessageComponentInterface
{

    public function onOpen(ConnectionInterface $conn)
    {
        // TODO: Implement onOpen() method.
    }

    public function onClose(ConnectionInterface $conn)
    {
        // TODO: Implement onClose() method.
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

    public function getApp():MyCustomAppProvider{
        return app('app_provider');
    }

    public function onMessage(ConnectionInterface $conn, MessageInterface $msg)
    {

        // TODO: Implement onMessage() method.
    }
}
