<?php

namespace SmartDato\Brt\ValueObjects;

use SmartDato\Brt\Contracts\Data;
use SmartDato\Brt\Enums\Alert\Type;

class Alert extends Data
{
    public function __construct(
        protected Type $type,
        protected string $phone,
        protected ?string $email = null,
    ) {}

    public function build(): array
    {
        return array_filter([
            'type' => $this->type->value,
            'mail' => $this->phone,
            'sms' => $this->email,
        ], fn ($value) => ! is_null($value));
    }
}
