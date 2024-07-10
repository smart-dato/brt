<?php

namespace SmartDato\Brt;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class BrtConnector extends Connector
{
    use AcceptsJson;

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return config('brt.base_url');
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',

            'X-Api-Key' => $this->token ?? config('brt.api_key'),
        ];
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        return [];
    }

    public function __construct(
        protected readonly ?string $token = null
    ) {}
}
