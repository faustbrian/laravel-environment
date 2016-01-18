<?php

namespace DraperStudio\Env\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

abstract class EnvCommand extends Command
{
    protected $files;

    public function __construct()
    {
        parent::__construct();

        $this->files = [
            'encrypted' => base_path('.env'),
            'backup' => base_path('.env.backup'),
            'decrypted' => base_path('.env.decrypted'),
        ];
    }

    protected function getEncrypter()
    {
        return new Encrypter(config('env.key'));
    }

    protected function getEnvVars($file = null)
    {
        return new Collection(parse_ini_file($this->files[$file ?: 'encrypted']));
    }

    protected function encrypt($value)
    {
        return $this->getEncrypter()->encrypt($value);
    }

    protected function decrypt($value)
    {
        return $this->getEncrypter()->decrypt(substr($value, 4));
    }

    protected function buildEncryptedString($key, $value)
    {
        return sprintf('%s="ENC:%s"', $key, $this->encrypt($value));
    }

    protected function buildDecryptedString($key, $value)
    {
        return sprintf('%s=%s', $key, $this->decrypt($value) ?: 'null');
    }

    protected function write($file, $contents)
    {
        return File::put($this->files[$file], $contents->implode("\n"));
    }

    protected function copy($src, $dest)
    {
        return File::copy($this->files[$src], $this->files[$dest]);
    }

    protected function delete($file)
    {
        return File::delete($this->files[$file]);
    }

    protected function exists($file)
    {
        return File::exists($this->files[$file]);
    }
}
