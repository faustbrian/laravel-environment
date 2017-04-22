<?php



declare(strict_types=1);



namespace BrianFaust\Environment\Console\Commands;

class RefreshEnvCommand extends EnvCommand
{
    /**
     * @var string
     */
    protected $signature = 'env:refresh';

    /**
     * @var string
     */
    protected $description = 'Re-Encrypt the .env file.';

    public function handle(): void
    {
        $contents = $this->getEnvVars('backup')->map(function ($value, $key) {
            return $this->buildEncryptedString($key, $value);
        });

        $this->write('encrypted', $contents);
    }
}
