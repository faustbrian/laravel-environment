<?php

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
