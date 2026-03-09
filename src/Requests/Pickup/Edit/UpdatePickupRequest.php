<?php

namespace SmartDato\Brt\Requests\Pickup\Edit;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdatePickupRequest extends Request implements HasBody
{
    use HasJsonBody;

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

    protected function defaultBody(): array
    {
        return $this->collectionRequest->build();
    }

    public function __construct(
        protected readonly string $id,
        protected readonly \SmartDato\Brt\ValueObjects\CollectionRequest $collectionRequest,
    ) {}
}
