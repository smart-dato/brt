<?php

namespace SmartDato\Brt\ValueObjects;

use SmartDato\Brt\Contracts\Data;
use SmartDato\Brt\Enums\Language;
use SmartDato\Brt\Enums\PayerType;
use SmartDato\Brt\Enums\PayeeType;

class BrtSpecifics extends Data
{
    /**
     * @param  array<Alert>  $alerts
     * @param  array<OpeningHour>  $openingHours
     */
    public function __construct(
        protected string $collectionTime,
        protected Language $language = Language::English,
        protected ?string $network = null,
        protected array $alerts = [],
        protected ?string $commissioned = null,
        protected ?string $notes = null,
        protected ?string $parcelInfos = null,
        protected ?array $openingHours = null,
        protected ?string $goodDescription = null,
        protected ?int $palletCount = null,
        protected ?PayerType $payerType = null,
        protected ?bool $hydraulicTailgateAvailable = null,
        protected float|int|null $weightKG = null,
        protected float|int|null $volumeMC = null,
        protected ?string $user = null,
        protected ?string $requestRef = null,
        protected ?Amount $insuredAmount = null,
        protected ?Amount $cashOnDeliveryAmount = null,
        protected ?string $cashType = null,
        protected ?PayeeType $payeeType = null,
        protected ?string $parcelIDFrom = null,
        protected ?string $parcelIDTo = null,
        protected ?bool $anticipate = null,
        protected ?string $serviceCode = null,
    ) {}

    public function build(): array
    {
        return array_filter([
            'language' => $this->language->value,
            'network' => $this->network,
            'alerts' => array_map(fn ($alert) => $alert->build(), $this->alerts),
            'commissioned' => $this->commissioned,
            'notes' => $this->notes,
            'parcelInfos' => $this->parcelInfos,
            'openingHours' => array_map(fn ($openingHour) => $openingHour->build(), $this->openingHours),
            'goodDescription' => $this->goodDescription,
            'palletCount' => $this->palletCount,
            'payerType' => $this->payerType?->value,
            'hydraulicTailgateAvailable' => $this->hydraulicTailgateAvailable,
            'collectionTime' => $this->collectionTime,
            'weightKG' => $this->weightKG,
            'volumeMC' => $this->volumeMC,
            'user' => $this->user,
            'requestRef' => $this->requestRef,
            'insuredAmount' => $this->insuredAmount?->build(),
            'cashOnDeliveryAmount' => $this->cashOnDeliveryAmount?->build(),
            'cashType' => $this->cashType,
            'payeeType' => $this->payeeType?->value,
            'parcelIDFrom' => $this->parcelIDFrom,
            'parcelIDTo' => $this->parcelIDTo,
            'anticipate' => $this->anticipate,
            'serviceCode' => $this->serviceCode,
        ], fn ($value) => ! is_null($value));
    }
}
