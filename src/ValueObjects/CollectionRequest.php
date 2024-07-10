<?php

namespace SmartDato\Brt\ValueObjects;

use SmartDato\Brt\Contracts\Data;

class CollectionRequest extends Data
{
    /**
     * Contains necessary information enabling one BU to collect a parcel on
     * behalf of another BU.
     */
    public function __construct(
        protected RequestInfos $requestInfos,
        protected array $stakeholders,
        protected BrtSpecifics $brtSpec,

        protected ?string $requestingDepot = null,
        protected ?string $sendingDepot = null,
        protected ?string $recipientDepot = null,

        protected ?CustomerInfos $customerInfos = null,
    ) {}

    public function build(): array
    {
        return array_filter([
            'requestInfos' => $this->requestInfos->build(),
            'requestingDepot' => $this->requestingDepot,
            'sendingDepot' => $this->sendingDepot,
            'recipientDepot' => $this->recipientDepot,
            'customerInfos' => $this->customerInfos?->build(),
            'stakeholders' => array_map(fn ($stackholder) => $stackholder->build(), $this->stakeholders),
            'brtSpec' => $this->brtSpec->build(),
        ], fn ($value) => ! is_null($value));

    }
}
