<?php

namespace SmartDato\Brt\Requests\Pickup\Cancellation;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class CancelPickupRequest extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return "/api/geodata/v410/colreqs/{$this->id}/cancel";
    }

    public function __construct(
        protected readonly string $id
    ) {}
}
