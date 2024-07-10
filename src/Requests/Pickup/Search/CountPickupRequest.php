<?php

namespace SmartDato\Brt\Requests\Pickup\Search;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class CountPickupRequest extends Request
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
        return '/api/geodata/v410/colreqs/count';
    }
}
