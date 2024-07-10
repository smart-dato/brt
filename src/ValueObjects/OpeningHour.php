<?php

namespace SmartDato\Brt\ValueObjects;

use SmartDato\Brt\Contracts\Data;

class OpeningHour extends Data
{

    public function __construct(
        protected string $from,
        protected string $to,
    ) {
    }

    public function build(): array
    {
        return [
            'from' => $this->from,
            'to' => $this->to,
        ];
    }
}
