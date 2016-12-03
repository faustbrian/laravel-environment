<?php

/*
 * This file is part of Laravel Environment.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BrianFaust\Environment\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

abstract class EnvCommand extends Command
{
    /**
     * @var array
     */
    protected $files;

    /**
     * EnvCommand constructor.
     */
    public function __construct(): void
    {
        parent::__construct();

        $this->files = [
            'encrypted' => base_path('.env'),
            'backup'    => base_path('.env.backup'),
            'decrypted' => base_path('.env.decrypted'),
        ];
    }

    /**
     * @return Encrypter
     */
    protected function getEncrypter()
    {
        return new Encrypter(config('env.key'));
    }

    /**
     * @param null $file
     *
     * @return Collection
     */
    protected function getEnvVars($file = null)
    {
        return new Collection(parse_ini_file($this->files[$file ?: 'encrypted']));
    }

    /**
     * @param $value
     *
     * @return string
     */
    protected function encrypt($value)
    {
        return $this->getEncrypter()->encrypt($value);
    }

    /**
     * @param $value
     *
     * @return string
     */
    protected function decrypt($value)
    {
        return $this->getEncrypter()->decrypt(substr($value, 4));
    }

    /**
     * @param $key
     * @param $value
     *
     * @return string
     */
    protected function buildEncryptedString($key, $value)
    {
        return sprintf('%s="ENC:%s"', $key, $this->encrypt($value));
    }

    /**
     * @param $key
     * @param $value
     *
     * @return string
     */
    protected function buildDecryptedString($key, $value)
    {
        return sprintf('%s=%s', $key, $this->decrypt($value) ?: 'null');
    }

    /**
     * @param $file
     * @param $contents
     *
     * @return mixed
     */
    protected function write($file, $contents)
    {
        return File::put($this->files[$file], $contents->implode("\n"));
    }

    /**
     * @param $src
     * @param $dest
     *
     * @return mixed
     */
    protected function copy($src, $dest)
    {
        return File::copy($this->files[$src], $this->files[$dest]);
    }

    /**
     * @param $file
     *
     * @return mixed
     */
    protected function delete($file)
    {
        return File::delete($this->files[$file]);
    }

    /**
     * @param $file
     *
     * @return mixed
     */
    protected function exists($file)
    {
        return File::exists($this->files[$file]);
    }
}
