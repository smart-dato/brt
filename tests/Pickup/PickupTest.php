<?php

it('can search pickups', function () {
    $connector = new \SmartDato\Brt\BrtConnector();
    $connector->withMockClient(new \Saloon\Http\Faking\MockClient([
        \SmartDato\Brt\Requests\Pickup\Search\SearchPickupRequest::class => \Saloon\Http\Faking\MockResponse::fixture('pickups.search.sucess'),
    ]));

    $response = $connector->send(
        new \SmartDato\Brt\Requests\Pickup\Search\SearchPickupRequest(
            limit: 1
        )
    );

    expect($response->json())
        ->toBeArray();
});

it('can create pickup', function () {
    $connector = new \SmartDato\Brt\BrtConnector();

    $connector->withMockClient(new \Saloon\Http\Faking\MockClient([
        \SmartDato\Brt\Requests\Pickup\Create\CreatePickupRequest::class => \Saloon\Http\Faking\MockResponse::fixture('pickups.create.sucess'),
    ]));

    $response = $connector->send(
        new \SmartDato\Brt\Requests\Pickup\Create\CreatePickupRequest([
                new \SmartDato\Brt\ValueObjects\CollectionRequest(
                    requestInfos: new \SmartDato\Brt\ValueObjects\RequestInfos(
                        collectionDate: now()->nextWeekday(),
                        parcelCount: 1
                    ),
                    customerInfos: new \SmartDato\Brt\ValueObjects\CustomerInfos(
                        custAccNumber: '0000000'

                    ),
                    stakeholders: [
                        new \SmartDato\Brt\ValueObjects\Stakeholder\Stakeholder(
                            type: \SmartDato\Brt\Enums\Stakeholder\Type::Requester,
                            customerInfos: new \SmartDato\Brt\ValueObjects\Stakeholder\Customer(
                                custAccNumber: '0000000000'
                            ),
                        ),
                        new \SmartDato\Brt\ValueObjects\Stakeholder\Stakeholder(
                            type: \SmartDato\Brt\Enums\Stakeholder\Type::Sender,
                            customerInfos: new \SmartDato\Brt\ValueObjects\Stakeholder\Customer(
                                custAccNumber: '0000000000'
                            ),
                            contact: new \SmartDato\Brt\ValueObjects\Stakeholder\Contact(
                                contactDetails: new \SmartDato\Brt\ValueObjects\Stakeholder\ContactDetails(
                                    phone: '0000000000',
                                    contactPerson: 'Foo Bar',
                                ),
                            ),
                        )
                    ],
                    brtSpec: new \SmartDato\Brt\ValueObjects\BrtSpecifics(
                        goodDescription: 'test',
                        payerType: \SmartDato\Brt\Enums\PayerType::Ordering,
                        collectionTime: '11:00',
                        alerts: [],
                        weightKG: 2.3,
                        openingHours: [
                            new \SmartDato\Brt\ValueObjects\OpeningHour(
                                from: '10:00',
                                to: '13:00',
                            ),
                            new \SmartDato\Brt\ValueObjects\OpeningHour(
                                from: '15:00',
                                to: '17:00',
                            ),
                        ],
                    ),

                )
            ]
        )
    );

    expect($response->status())
        ->toBe(200);

    $data = $response->json();

    expect($data)
        ->toBeArray();

    expect($data[0])->toHaveKeys([
        "ormReservationNumber",
        "ormNumber",
        "sendingDepot",
        "recipientDepot",
        "collectionDate",
        "minCollectionDate",
        "valid",
        "parcels",
        "serviceTime",
        "commissioned",
        "errors",
    ]);
});
