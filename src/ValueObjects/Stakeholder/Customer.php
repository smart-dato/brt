<?php

namespace SmartDato\Brt\ValueObjects\Stakeholder;

use SmartDato\Brt\Contracts\Data;

class Customer extends Data
{
    public function __construct(
        protected ?string $custAccNumber = null,
    ) {}

    public function build(): array
    {
        return array_filter([
            'custAccNumber' => $this->custAccNumber,
        ], fn ($value) => ! is_null($value));
    }
}
