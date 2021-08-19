<?php

namespace App\Events\Websocket;

use Illuminate\Foundation\Application;

class ConnectionDisconnected
{
    public function __construct(
        public Application $app,
        public Application $sandbox,
        public int $fd
    ){
    }
}
