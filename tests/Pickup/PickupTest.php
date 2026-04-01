<?php

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\Brt\BrtConnector;
use SmartDato\Brt\Enums\PayerType;
use SmartDato\Brt\Enums\Stakeholder\Type;
use SmartDato\Brt\Requests\Pickup\Create\CreatePickupRequest;
use SmartDato\Brt\Requests\Pickup\Search\SearchPickupRequest;
use SmartDato\Brt\ValueObjects\BrtSpecifics;
use SmartDato\Brt\ValueObjects\CollectionRequest;
use SmartDato\Brt\ValueObjects\CustomerInfos;
use SmartDato\Brt\ValueObjects\OpeningHour;
use SmartDato\Brt\ValueObjects\RequestInfos;
use SmartDato\Brt\ValueObjects\Stakeholder\Contact;
use SmartDato\Brt\ValueObjects\Stakeholder\ContactDetails;
use SmartDato\Brt\ValueObjects\Stakeholder\Customer;
use SmartDato\Brt\ValueObjects\Stakeholder\Stakeholder;

it('can search pickups', function () {
    $connector = new BrtConnector;
    $connector->withMockClient(new MockClient([
        SearchPickupRequest::class => MockResponse::fixture('pickups/search/sucess'),
    ]));

    $response = $connector->send(
        new SearchPickupRequest(
            limit: 1
        )
    );

    expect($response->json())
        ->toBeArray();
});

it('can create pickup', function () {
    $connector = new BrtConnector;

    $connector->withMockClient(new MockClient([
        CreatePickupRequest::class => MockResponse::fixture('pickups/create/sucess'),
    ]));

    $response = $connector->send(
        new CreatePickupRequest([
            new CollectionRequest(
                requestInfos: new RequestInfos(
                    collectionDate: now()->nextWeekday(),
                    parcelCount: 1
                ),
                customerInfos: new CustomerInfos(
                    custAccNumber: '0000000'

                ),
                stakeholders: [
                    new Stakeholder(
                        type: Type::Requester,
                        customerInfos: new Customer(
                            custAccNumber: '0000000000'
                        ),
                    ),
                    new Stakeholder(
                        type: Type::Sender,
                        customerInfos: new Customer(
                            custAccNumber: '0000000000'
                        ),
                        contact: new Contact(
                            contactDetails: new ContactDetails(
                                phone: '0000000000',
                                contactPerson: 'Foo Bar',
                            ),
                        ),
                    ),
                ],
                brtSpec: new BrtSpecifics(
                    goodDescription: 'test',
                    payerType: PayerType::Ordering,
                    collectionTime: '11:00',
                    alerts: [],
                    weightKG: 2.3,
                    openingHours: [
                        new OpeningHour(
                            from: '10:00',
                            to: '13:00',
                        ),
                        new OpeningHour(
                            from: '15:00',
                            to: '17:00',
                        ),
                    ],
                ),

            ),
        ]
        )
    );

    expect($response->status())
        ->toBe(200);

    $data = $response->json();

    expect($data)
        ->toBeArray();

    expect($data[0])->toHaveKeys([
        'ormReservationNumber',
        'ormNumber',
        'sendingDepot',
        'recipientDepot',
        'collectionDate',
        'minCollectionDate',
        'valid',
        'parcels',
        'serviceTime',
        'commissioned',
        'errors',
    ]);
});
