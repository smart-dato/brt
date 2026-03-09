# BRT Laravel SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/smart-dato/brt.svg?style=flat-square)](https://packagist.org/packages/smart-dato/brt)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/brt/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/smart-dato/brt/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/brt/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/smart-dato/brt/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/smart-dato/brt.svg?style=flat-square)](https://packagist.org/packages/smart-dato/brt)

A Laravel package for integrating with the [BRT (Bartolini)](https://www.brt.it/) courier API, built on [Saloon](https://docs.saloon.dev/).

## Installation

```bash
composer require smart-dato/brt
```

Publish the config file:

```bash
php artisan vendor:publish --tag="brt-config"
```

This is the contents of the published config file:

```php
return [
    'base_url' => env('BRT_BASE_URL', 'https://api.brt.it/orm'),
    'api_key' => env('BRT_API_KEY'),
];
```

Add your API key to `.env`:

```
BRT_API_KEY=your-api-key
```

## Usage

### Create a pickup request

```php
use SmartDato\Brt\BrtConnector;
use SmartDato\Brt\Enums\PayerType;
use SmartDato\Brt\Enums\Stakeholder\Type;
use SmartDato\Brt\Requests\Pickup\Create\CreatePickupRequest;
use SmartDato\Brt\ValueObjects\BrtSpecifics;
use SmartDato\Brt\ValueObjects\CollectionRequest;
use SmartDato\Brt\ValueObjects\CustomerInfos;
use SmartDato\Brt\ValueObjects\OpeningHour;
use SmartDato\Brt\ValueObjects\RequestInfos;
use SmartDato\Brt\ValueObjects\Stakeholder\Contact;
use SmartDato\Brt\ValueObjects\Stakeholder\ContactDetails;
use SmartDato\Brt\ValueObjects\Stakeholder\Customer;
use SmartDato\Brt\ValueObjects\Stakeholder\Stakeholder;

$connector = new BrtConnector();

$response = $connector->send(
    new CreatePickupRequest([
        new CollectionRequest(
            requestInfos: new RequestInfos(
                collectionDate: now()->nextWeekday(),
                parcelCount: 1,
            ),
            customerInfos: new CustomerInfos(
                custAccNumber: '0000000',
            ),
            stakeholders: [
                new Stakeholder(
                    type: Type::Requester,
                    customerInfos: new Customer(
                        custAccNumber: '0000000000',
                    ),
                ),
                new Stakeholder(
                    type: Type::Sender,
                    customerInfos: new Customer(
                        custAccNumber: '0000000000',
                    ),
                    contact: new Contact(
                        contactDetails: new ContactDetails(
                            phone: '0000000000',
                            contactPerson: 'John Doe',
                        ),
                    ),
                ),
            ],
            brtSpec: new BrtSpecifics(
                collectionTime: '11:00',
                goodDescription: 'Package description',
                payerType: PayerType::Ordering,
                weightKG: 2.3,
                openingHours: [
                    new OpeningHour(from: '10:00', to: '13:00'),
                    new OpeningHour(from: '15:00', to: '17:00'),
                ],
            ),
        ),
    ])
);

$data = $response->json();
```

### Search pickup requests

```php
use SmartDato\Brt\BrtConnector;
use SmartDato\Brt\Enums\Sort;
use SmartDato\Brt\Requests\Pickup\Search\SearchPickupRequest;

$connector = new BrtConnector();

$response = $connector->send(
    new SearchPickupRequest(
        limit: 10,
        offset: 0,
        sort: Sort::DESC,
    )
);
```

### Get pickup details

```php
use SmartDato\Brt\Requests\Pickup\Search\DetailPickupRequest;

$response = $connector->send(new DetailPickupRequest(id: '123456'));
```

### Count pickup requests

```php
use SmartDato\Brt\Requests\Pickup\Search\CountPickupRequest;

$response = $connector->send(new CountPickupRequest());
```

### Cancel a pickup

```php
use SmartDato\Brt\Requests\Pickup\Cancellation\CancelPickupRequest;

$response = $connector->send(new CancelPickupRequest(id: '123456'));
```

### Update a pickup

```php
use SmartDato\Brt\Requests\Pickup\Edit\UpdatePickupRequest;

$response = $connector->send(new UpdatePickupRequest(id: '123456'));
```

### Using a custom API key

You can pass a token directly to the connector instead of using the config:

```php
$connector = new BrtConnector(token: 'your-api-key');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [SmartDato](https://github.com/smart-dato)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
