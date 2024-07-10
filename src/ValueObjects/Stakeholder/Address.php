<?php

namespace SmartDato\Brt\ValueObjects\Stakeholder;

use SmartDato\Brt\Contracts\Data;

class Address extends Data
{
    public function __construct(
        protected string $compName,
        protected string $street,
        protected string $countryCode,
        protected string $state,
        protected string $zipCode,
        protected string $city,
    ) {}

    public function build(): array
    {
        return [
            'compName' => $this->compName,
            'street' => $this->street,
            'countryCode' => $this->countryCode,
            'state' => $this->state,
            'zipCode' => $this->zipCode,
            'city' => $this->city,
        ];
    }
}
