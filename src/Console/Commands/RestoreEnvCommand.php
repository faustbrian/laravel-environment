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
 * Class RestoreEnvCommand.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class RestoreEnvCommand extends EnvCommand
{
    /**
     * @var string
     */
    protected $signature = 'env:restore';

    /**
     * @var string
     */
    protected $description = 'Restore the .env file.';

    public function handle()
    {
        $this->copy('backup', 'encrypted');

        $this->delete('backup');
    }
}
