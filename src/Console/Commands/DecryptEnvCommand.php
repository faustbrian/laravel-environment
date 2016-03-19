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
 * Class DecryptEnvCommand.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class DecryptEnvCommand extends EnvCommand
{
    /**
     * @var string
     */
    protected $signature = 'env:decrypt';

    /**
     * @var string
     */
    protected $description = 'Decrypt the .env file.';

    public function handle()
    {
        $contents = $this->getEnvVars()->map(function ($value, $key) {
            return $this->buildDecryptedString($key, $value);
        });

        $this->write('decrypted', $contents);
    }
}
