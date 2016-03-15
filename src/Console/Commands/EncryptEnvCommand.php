<?php

/*
 * This file is part of Laravel Secure Environment.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Environment\Console\Commands;

/**
 * Class EncryptEnvCommand.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class EncryptEnvCommand extends EnvCommand
{
    /**
     * @var string
     */
    protected $signature = 'env:encrypt';

    /**
     * @var string
     */
    protected $description = 'Encrypt the .env file.';

    /**
     *
     */
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
