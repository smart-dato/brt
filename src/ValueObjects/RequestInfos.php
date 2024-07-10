<?php

namespace SmartDato\Brt\ValueObjects;

use Carbon\Carbon;
use SmartDato\Brt\Contracts\Data;

class RequestInfos extends Data
{
    public function __construct(
        protected Carbon $collectionDate,
        protected ?string $crReOrderNr = null,
        protected ?string $parcelCount = null,
    ) {}

    public function build(): array
    {
        return array_filter([
            'crReOrderNr' => $this->crReOrderNr,
            'parcelCount' => $this->parcelCount,
            'collectionDate' => $this->collectionDate->toDateString(),
        ], fn ($value) => ! is_null($value));
    }
}
