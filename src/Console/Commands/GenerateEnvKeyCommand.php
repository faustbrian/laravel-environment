<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Environment.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Environment\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

/**
 * Class GenerateEnvKeyCommand.
 *
 * @author Brian Faust <hello@basecode.sh>
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
