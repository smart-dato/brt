<?php

namespace SmartDato\Brt\Requests\Pickup\Edit;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class UpdatePickupRequest extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::PUT;

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
