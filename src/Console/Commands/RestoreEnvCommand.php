<?php

/*
 * This file is part of Laravel Environment.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Environment\Console\Commands;

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
