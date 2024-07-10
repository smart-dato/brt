<?php

namespace SmartDato\Brt\Requests\Pickup\Search;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use SmartDato\Brt\Enums\Sort;

class SearchPickupRequest extends Request
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
        return '/api/geodata/v410/colreqs';
    }

    /**
     * _limit: limit (default: 50)
     * _offset: page (default: 0)
     * _sort: sort (values: ASC, DESC) (default: collectionDate_sort=DESC)
     */
    public function __construct(
        protected readonly int $limit = 50,
        protected readonly int $offset = 0,

        protected readonly Sort $sort = Sort::DESC,
    ) {}

    protected function defaultQuery(): array
    {
        return [
            '_limit' => $this->limit,
            '_offset' => $this->offset,
            'collectionDate_sort' => $this->sort->value,
        ];
    }
}
