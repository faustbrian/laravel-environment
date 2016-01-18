<?php

namespace DraperStudio\Env\Console\Commands;

class RefreshEnvCommand extends EnvCommand
{
    protected $signature = 'env:refresh';

    protected $description = 'Re-Encrypt the .env file.';

    public function handle()
    {
        $contents = $this->getEnvVars('backup')->map(function ($value, $key) {
            return $this->buildEncryptedString($key, $value);
        });

        $this->write('encrypted', $contents);
    }
}
