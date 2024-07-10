<?php

namespace SmartDato\Brt\ValueObjects;

use SmartDato\Brt\Contracts\Data;
use SmartDato\Brt\Enums\Currency;

class Amount extends Data
{
    public function __construct(
        protected float|int $value,
        protected Currency $currency = Currency::Euro,
    ) {}

    public function build(): array
    {
        return [
            'value' => round($this->value, 2),
            'currency' => $this->currency->value,
        ];
    }
}
