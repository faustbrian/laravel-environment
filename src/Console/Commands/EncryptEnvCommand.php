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

namespace BrianFaust\Environment\Console\Commands;

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
