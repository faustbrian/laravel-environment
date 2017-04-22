<?php



declare(strict_types=1);



namespace BrianFaust\Environment\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

/**
 * Class GenerateEnvKeyCommand.
 *
 * @author Brian Faust <hello@brianfaust.de>
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

    public function handle(): void
    {
        $this->info(Str::random(16));
    }
}
