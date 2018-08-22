# Nova Custom Dashboard Card

[![Latest Version on Packagist](https://img.shields.io/packagist/v/beyondcode/nova-custom-dashboard-card.svg?style=flat-square)](https://packagist.org/packages/beyondcode/nova-custom-dashboard-card)
[![Total Downloads](https://img.shields.io/packagist/dt/beyondcode/nova-custom-dashboard-card.svg?style=flat-square)](https://packagist.org/packages/beyondcode/nova-custom-dashboard-card)

This package lets you create customizable dashboards for every Nova user.

![screenshot](https://beyondco.de/github/nova-custom-dashboard-card/demo.gif)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require beyondcode/nova-custom-dashboard-card
```

Next up, you must register the card with Nova. This is typically done in the `cards` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvder.php

// ...
public function cards()
{
    return [
        // ...
        new \Beyondcode\CustomDashboardCard\CustomDashboard,
    ];
}
```

## Define available cards

Similar to Nova itself, you can define all cards that should be available for selection in the `Add Card` modal.

All these cards follow the same authorization rules as any other Nova card - so you do not need to worry about this.

You can register them in your `NovaServiceProvider`

```php
// in app/Providers/NovaServiceProvder.php

use Beyondcode\CustomDashboardCard\NovaCustomDashboard;

public function boot()
{
    parent::boot();

    NovaCustomDashboard::cards([
        new UsersPerDay,
        new TotalUsers,
        new TotalAwesomeUsers,
        // ... all cards you want to be available 
    ]);
}

```

## Define custom card names

If you want to define a custom card name, that will be shown in the modal, pass it to the card as a `card-name` meta attribute, like this:

```php
NovaCustomDashboard::cards([
    (new LaravelUpdateCard)->withMeta([
        'card-name' => 'Laravel Updates Available'
    ]),
]);
```

## Usage

Visit your Nova dashboard and click the `Add Card` button to add new cards to the customized dashboard. The custom dashboard will be stored in localstorage for every user. 

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email marcel@beyondco.de instead of using the issue tracker.

## Credits

- [Marcel Pociot](https://github.com/mpociot)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
