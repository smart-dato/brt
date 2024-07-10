# BRT Laravel sdk

[![Latest Version on Packagist](https://img.shields.io/packagist/v/smart-dato/brt.svg?style=flat-square)](https://packagist.org/packages/smart-dato/brt)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/brt/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/smart-dato/brt/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/brt/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/smart-dato/brt/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/smart-dato/brt.svg?style=flat-square)](https://packagist.org/packages/smart-dato/brt)

Laravel BRT SDK

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/brt.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/brt)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require smart-dato/brt
```

You can publish the config file with:

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

## Usage

```php
$brt = new SmartDato\Brt();
echo $brt->echoPhrase('Hello, SmartDato!');
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
