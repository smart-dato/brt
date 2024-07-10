<?php

namespace SmartDato\Brt\ValueObjects\Stakeholder;

use SmartDato\Brt\Contracts\Data;
use SmartDato\Brt\Enums\Stakeholder\Type;

class Stakeholder extends Data
{
    public function __construct(
        protected Type $type,
        protected ?Customer $customerInfos = null,
        protected ?Contact $contact = null,
        protected ?Address $address = null,
    ) {}

    public function build(): array
    {
        return array_filter([
            'customerInfos' => $this->customerInfos?->build(),
            'type' => $this->type->value,
            'contact' => $this->contact?->build(),
            'address' => $this->address?->build(),
        ], fn ($value) => ($value !== null));

    }
}
