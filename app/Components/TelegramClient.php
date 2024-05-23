<?php

namespace App\Components;

use GuzzleHttp\Client;

class TelegramClient
{
    public Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'timeout' => 2.0,
            'verify' => false
        ]);
    }
}
