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

/*
 * This file is part of Laravel Environment.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Environment\Console\Commands;

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
