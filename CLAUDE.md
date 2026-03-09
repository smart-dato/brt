# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

Laravel package (`smart-dato/brt`) providing integration with the BRT (Bartolini) courier API via Saloon HTTP client. Supports Laravel 10/11/12 on PHP 8.2+.

## Commands

```bash
composer test              # Run Pest tests
composer test-coverage     # Run tests with coverage
composer analyse           # PHPStan (level 5)
composer format            # Laravel Pint code style

# Run a single test file
./vendor/bin/pest tests/Feature/SearchPickupTest.php
# Run a single test by name
./vendor/bin/pest --filter="test name here"

composer build             # Prepare package & build workbench
composer start             # Build + serve workbench
```

## Architecture

- **BrtConnector** (`src/BrtConnector.php`): Saloon Connector handling auth headers (`X-Api-Key`) and base URL
- **Requests** (`src/Requests/Pickup/`): Saloon Request classes organized by operation (Create, Search, Edit, Cancellation). Each defines `resolveEndpoint()` and `defaultBody()`/`defaultQuery()`
- **ValueObjects** (`src/ValueObjects/`): Data classes extending the `Data` contract (`src/Contracts/Data.php`), each implementing `build(): array` to produce API payloads. Use `array_filter` to omit null fields
- **Enums** (`src/Enums/`): Backed string enums for type-safe API values (Currency, Network, Language, PayerType, Sort, etc.)
- **BrtServiceProvider**: Uses Spatie's LaravelPackageTools; publishes config with `brt.base_url` and `brt.api_key`

## Testing

Tests use Pest with Orchestra Testbench. HTTP responses are mocked via Saloon's `MockClient` with JSON fixtures in `tests/Fixtures/Saloon/`. Architecture tests enforce no debug functions (`dd`, `dump`, `ray`).

## Conventions

- Namespace: `SmartDato\Brt\`
- 4-space indentation, UTF-8, LF line endings
- Dates via Carbon with `toDateString()` format
- CI matrix tests across PHP 8.2/8.3 × Laravel 10/11 × Linux/Windows
