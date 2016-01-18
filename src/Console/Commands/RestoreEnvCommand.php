<?php

namespace DraperStudio\Env\Console\Commands;

class RestoreEnvCommand extends EnvCommand
{
    protected $signature = 'env:restore';

    protected $description = 'Restore the .env file.';

    public function handle()
    {
        $this->copy('backup', 'encrypted');

        $this->delete('backup');
    }
}
