# Laravel json-ld
This package allows you to use the `torann/json-ld` package with Laravel.

## Installation
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

## Credits
- [Fabio Cagliero](https://github.com/fab120)

## License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
