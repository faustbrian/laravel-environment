<?php



declare(strict_types=1);



namespace BrianFaust\Environment\Console\Commands;

class EncryptEnvCommand extends EnvCommand
{
    /**
     * @var string
     */
    protected $signature = 'env:encrypt';

    /**
     * @var string
     */
    protected $description = 'Encrypt the .env file.';

    public function handle(): void
    {
        if ($this->exists('backup')) {
            $this->error('.env file is already encrypted.');
            $this->info('Delete the .env.backup file and try again.');

            return;
        }

        $contents = $this->getEnvVars()->map(function ($value, $key) {
            return $this->buildEncryptedString($key, $value);
        });

        $this->copy('encrypted', 'backup');

        $this->write('encrypted', $contents);
    }
}
