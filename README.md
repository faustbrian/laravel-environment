# Laravel Environment

[![Build Status](https://img.shields.io/travis/artisanry/Environment/master.svg?style=flat-square)](https://travis-ci.org/artisanry/Environment)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/artisanry/environment.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/artisanry/Environment.svg?style=flat-square)](https://github.com/artisanry/Environment/releases)
[![License](https://img.shields.io/packagist/l/artisanry/Environment.svg?style=flat-square)](https://packagist.org/packages/artisanry/Environment)

Based on the article [How to keep a secret](http://blog.fortrabbit.com/how-to-keep-a-secret).

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require artisanry/environment
```

## Configuration

Laravel Env supports optional configuration.

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish --provider="Artisanry\Environment\EnvironmentServiceProvider"
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
require_once(__DIR__.'/../vendor/artisanry/environment/src/functions.php');
```

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@basecode.sh. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://basecode.sh)
