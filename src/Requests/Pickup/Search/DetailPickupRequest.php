<?php

namespace SmartDato\Brt\Requests\Pickup\Search;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DetailPickupRequest extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return "/api/geodata/v410/colreqs/{$this->id}";
    }

    public function __construct(
        protected readonly string $id
    ) {}
}
