# Laravel json-ld
[![Latest Version on Packagist](https://img.shields.io/packagist/v/webnuvola/laravel-json-ld.svg?style=flat-square)](https://packagist.org/packages/webnuvola/laravel-json-ld)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/webnuvola/laravel-json-ld/Tests?label=tests)](https://github.com/webnuvola/laravel-json-ld/actions?query=workflow%3ATests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/webnuvola/laravel-json-ld.svg?style=flat-square)](https://packagist.org/packages/webnuvola/laravel-json-ld)

This package allows you to use the `torann/json-ld` package with Laravel.

## Installation
You can install the package via composer:

```bash
composer require webnuvola/laravel-json-ld
```

## Usage

### Create a new json-ld entry
```php
jsonld(string $context, array $data = [])
```
[See torann/json-ld documentation](https://github.com/Torann/json-ld)

### Output json-ld data to your view
```blade
{{ jsonld() }}
```

## Testing
```bash
composer test
```

## Credits
- [Fabio Cagliero](https://github.com/fab120)

## License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
