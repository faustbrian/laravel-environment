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

use Illuminate\Support\Str;
use Illuminate\Console\Command;

/**
 * Class GenerateEnvKeyCommand.
 *
 * @author Brian Faust <hello@brianfaust.me>
 */
class GenerateEnvKeyCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'env:key';

    /**
     * @var string
     */
    protected $description = 'Generate a new encryption key for the env.php config file.';

    public function handle()
    {
        $this->info(Str::random(16));
    }
}
