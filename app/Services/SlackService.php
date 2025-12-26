<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class SlackService
{
    protected ?string $webhook_url = null;
    public function __construct()
    {
        $this->webhook_url = match (config('app.env')) {
            'local' => config('services.slack.local.webhook_url'),
            'production' => config('services.slack.production.webhook_url')
        };
    }

    /**
     * @throws ConnectionException
     */
    public function send(string $message): bool
    {
        try {
            Http::post($this->webhook_url, [
                'text' => $message
            ]);
        } catch (ConnectionException $e) {
            throw new ConnectionException($e->getMessage());
        }

        return true;
    }
}
