<?php

namespace DraperStudio\Env\Console\Commands;

class EncryptEnvCommand extends EnvCommand
{
    protected $signature = 'env:encrypt';

    protected $description = 'Encrypt the .env file.';

    public function handle()
    {
        if ($this->exists('backup')) {
            $this->error('.env file is already encrypted.');
            $this->info('Delete the .env.backup file and try again.');

            return;
        }

        $contents = $this->getEnvVars()->map(function ($value, $key) {
            return $this->buildEncryptedString($key, $value);
        });

        $this->copy('encrypted', 'backup');

        $this->write('encrypted', $contents);
    }
}
