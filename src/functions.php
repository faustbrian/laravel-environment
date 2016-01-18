<?php


if (!function_exists('sec_env')) {
    function sec_env($name, $fallback = null)
    {
        $env = require __DIR__.'./../config/env.php';
        $crypt = new \Illuminate\Encryption\Encrypter($env['key']);

        $value = env($name);

        return empty($value)
                    ? env($name, $fallback)
                    : $crypt->decrypt(substr($value, 4));
    }
}
