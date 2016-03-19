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

use Illuminate\Console\Command;
use Illuminate\Support\Str;

/**
 * Class GenerateEnvKeyCommand.
 *
 * @author DraperStudio <hello@draperstudio.tech>
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
