# Laravel Enviroment

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Based on the article [How to keep a secret](http://blog.fortrabbit.com/how-to-keep-a-secret).

## Install

Via Composer

``` bash
$ composer require draperstudio/laravel-secure-environment
```

And then, if using Laravel 5, include the service provider within `app/config/app.php`.

``` php
'providers' => [
    // ... Illuminate Providers
    // ... App Providers
    DraperStudio\Environment\ServiceProvider::class
];
```

## Configuration

Laravel Env supports optional configuration.

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish --provider="DraperStudio\Environment\ServiceProvider"
```

This will create a `config/env.php` file in your app that you can modify to set your configuration. Also, make sure you check for changes to the original config file in this package between releases.

## Usage

To get started, you'll need to generate a new encryption key for the `env.php` config file.

```bash
$ php artisan env:key
// 5W183ikLhZqoJ1Ye
```

Copy this key and place it within the `env.php` config file.

##### Register `sec_env` method

Add the following code at the very top of `bootstrap/app.php`, above any other code:

``` php
require_once(__DIR__.'/../vendor/draperstudiolaravel-secure-environment/src/functions.php');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@draperstudio.tech instead of using the issue tracker.

## Credits

- [DraperStudio][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/DraperStudio/laravel-secure-environment.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/DraperStudio/Laravel-Env/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/DraperStudio/laravel-secure-environment.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/DraperStudio/laravel-secure-environment.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/DraperStudio/laravel-secure-environment.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/DraperStudio/laravel-secure-environment
[link-travis]: https://travis-ci.org/DraperStudio/Laravel-Env
[link-scrutinizer]: https://scrutinizer-ci.com/g/DraperStudio/laravel-secure-environment/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/DraperStudio/laravel-secure-environment
[link-downloads]: https://packagist.org/packages/DraperStudio/laravel-secure-environment
[link-author]: https://github.com/DraperStudio
[link-contributors]: ../../contributors
