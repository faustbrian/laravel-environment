<?php

namespace DraperStudio\Env\Console\Commands;

class DecryptEnvCommand extends EnvCommand
{
    protected $signature = 'env:decrypt';

    protected $description = 'Decrypt the .env file.';

    public function handle()
    {
        $contents = $this->getEnvVars()->map(function ($value, $key) {
            return $this->buildDecryptedString($key, $value);
        });

        $this->write('decrypted', $contents);
    }
}
