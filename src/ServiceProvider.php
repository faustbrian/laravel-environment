<?php

/*
 * This file is part of Laravel Environment.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BrianFaust\Environment;

class ServiceProvider extends \BrianFaust\ServiceProvider\ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishConfig();
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        parent::register();

        $this->mergeConfig();

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

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName(): string
    {
        return 'env';
    }
}
