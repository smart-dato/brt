<?php

namespace SmartDato\Brt\Requests\Pickup\Cancellation;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeletePickupRequest extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::DELETE;

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
