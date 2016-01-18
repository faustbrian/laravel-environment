<?php

namespace DraperStudio\Env;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'env';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishConfig()
             ->mergeConfig($this->packageName);
    }

    public function register()
    {
        define('SECURE_DOT_ENV', true);

        $this->commands(Console\Commands\DecryptEnvCommand::class);
        $this->commands(Console\Commands\EncryptEnvCommand::class);
        $this->commands(Console\Commands\GenerateEnvKeyCommand::class);
        $this->commands(Console\Commands\RefreshEnvCommand::class);
        $this->commands(Console\Commands\RestoreEnvCommand::class);
    }
}
