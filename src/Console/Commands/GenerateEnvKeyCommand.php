<?php

namespace DraperStudio\Env\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateEnvKeyCommand extends Command
{
    protected $signature = 'env:key';

    protected $description = 'Generate a new encryption key for the env.php config file.';

    public function handle()
    {
        $this->info(Str::random(16));
    }
}
