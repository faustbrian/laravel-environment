<?php

/*
 * This file is part of Laravel Environment.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Environment;

use Illuminate\Support\ServiceProvider;

class EnvironmentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-env.php' => config_path('laravel-env.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-env.php', 'laravel-env');

        if (!defined('SECURE_DOT_ENV')) {
            define('SECURE_DOT_ENV', true);
        }

        $this->commands(Console\Commands\DecryptEnvCommand::class);
        $this->commands(Console\Commands\EncryptEnvCommand::class);
        $this->commands(Console\Commands\GenerateEnvKeyCommand::class);
        $this->commands(Console\Commands\RefreshEnvCommand::class);
        $this->commands(Console\Commands\RestoreEnvCommand::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return array_merge(parent::provides(), [
            Console\Commands\DecryptEnvCommand::class,
            Console\Commands\EncryptEnvCommand::class,
            Console\Commands\GenerateEnvKeyCommand::class,
            Console\Commands\RefreshEnvCommand::class,
            Console\Commands\RestoreEnvCommand::class,
        ]);
    }
}
