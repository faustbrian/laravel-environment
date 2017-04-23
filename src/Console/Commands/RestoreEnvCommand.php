<?php


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

    public function handle(): void
    {
        $this->copy('backup', 'encrypted');

        $this->delete('backup');
    }
}
