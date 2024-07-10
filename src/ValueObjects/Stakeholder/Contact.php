<?php

namespace SmartDato\Brt\ValueObjects\Stakeholder;

use SmartDato\Brt\Contracts\Data;

class Contact extends Data
{
    public function __construct(
        protected ContactDetails $contactDetails,
        protected ?string $description = null,
    ) {}

    public function build(): array
    {
        return array_filter([
            'description' => $this->description,
            'contactDetails' => $this->contactDetails->build(),
        ], fn ($value) => ($value !== null));
    }
}
