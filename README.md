# Laravel Env

Based on the article [How to keep a secret](http://blog.fortrabbit.com/how-to-keep-a-secret).

## Installation

First, pull in the package through Composer.

```js
composer require draperstudio/laravel-env:1.0.*@dev
```

And then, if using Laravel 5, include the service provider within `app/config/app.php`.

```php
'providers' => [
    // ... Illuminate Providers
    // ... App Providers
    DraperStudio\Env\ServiceProvider::class
];
```

## Configuration

Laravel Env supports optional configuration.

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish --provider="DraperStudio\Env\ServiceProvider"
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

```php
require_once(__DIR__.'/../vendor/draperstudiolaravel-env/src/functions.php');
```

## License

Laravel Env is licensed under [The MIT License (MIT)](LICENSE).
