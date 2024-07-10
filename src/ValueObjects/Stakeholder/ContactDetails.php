<?php

namespace SmartDato\Brt\ValueObjects\Stakeholder;

use SmartDato\Brt\Contracts\Data;

class ContactDetails extends Data
{
    public function __construct(
        protected string $contactPerson,
        protected string $phone,
        protected ?string $email = null,
    ) {}

    public function build(): array
    {
        return array_filter([
            'contactPerson' => $this->contactPerson,
            'phone' => $this->phone,
            'email' => $this->email,
        ], fn ($value) => ! is_null($value));
    }
}
