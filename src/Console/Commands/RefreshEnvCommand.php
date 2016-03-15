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
 * Class RefreshEnvCommand.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class RefreshEnvCommand extends EnvCommand
{
    /**
     * @var string
     */
    protected $signature = 'env:refresh';

    /**
     * @var string
     */
    protected $description = 'Re-Encrypt the .env file.';

    /**
     *
     */
    public function handle()
    {
        $contents = $this->getEnvVars('backup')->map(function ($value, $key) {
            return $this->buildEncryptedString($key, $value);
        });

        $this->write('encrypted', $contents);
    }
}
