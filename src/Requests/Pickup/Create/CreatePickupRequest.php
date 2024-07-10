<?php

namespace SmartDato\Brt\Requests\Pickup\Create;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Contracts\Body\HasBody;

class CreatePickupRequest extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/api/geodata/v410/colreqs';
    }

    protected function defaultBody(): array
    {
        return array_map(fn($request) => $request->build(), $this->collectionRequests);
    }

    /**
     * @param  array<\SmartDato\Brt\ValueObjects\CollectionRequest>  $collectionRequests
     */
    public function __construct(
        protected array $collectionRequests,
    ) {
    }
}
