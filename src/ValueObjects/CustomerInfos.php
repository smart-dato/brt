<?php

namespace SmartDato\Brt\ValueObjects;

use SmartDato\Brt\Contracts\Data;

class CustomerInfos extends Data
{
    public function __construct(
        protected ?string $custAccNumber = null,
        protected ?int $custSubAccNumber = null,
        protected ?string $uniqCustId = null,
        protected ?string $crReOrderNrCus = null,
    ) {}

    public function build(): array
    {
        return array_filter([
            'custAccNumber' => $this->custAccNumber,
            'custSubAccNumber' => $this->custSubAccNumber,
            'uniqCustId' => $this->uniqCustId,
            'crReOrderNrCus' => $this->crReOrderNrCus,
        ], fn ($value) => ! is_null($value));

    }
}
